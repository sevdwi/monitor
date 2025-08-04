<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;


class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->query('user_id');
        $users = User::all();

        // Ambil jumlah laporan per kategori
        $kategoriCounts = Laporan::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // Ambil jumlah laporan per kategori dan status
        $statusPerKategori = Laporan::select('kategori', 'status_pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('kategori', 'status_pekerjaan')
            ->get()
            ->groupBy('kategori');

        if (!$userId) {
            return view('pages.dashboard', compact('users', 'kategoriCounts', 'statusPerKategori')); // Kasus belum pilih user
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('dashboard.user')->with('error', 'User tidak ditemukan.');
        }

        $statusPerKategori = Laporan::select('kategori', 'status_pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('kategori', 'status_pekerjaan')
            ->get()
            ->groupBy('kategori');

        $laporan = $user->laporanDibuat
            ->merge($user->laporanPIC)
            ->unique('id')
            ->sortByDesc('mulai_pekerjaan')
            ->values();

        return view('pages.dashboard', compact('user', 'laporan', 'statusPerKategori', 'users'));
    }

    public function fetchData(Request $request)
    {
        $userId = $request->query('user_id');
        $month = $request->query('month');
        $year = $request->query('year');

        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User tidak ditemukan.'], 404);
        }

        $laporanCollection = $user->laporanDibuat
            ->merge($user->laporanPIC)
            ->unique('id');

        if ($month && $year) {
            $laporanCollection = $laporanCollection->filter(function ($laporan) use ($month, $year) {
                if (!$laporan->mulai_pekerjaan) return false;
                return $laporan->mulai_pekerjaan->format('Y') == $year
                    && $laporan->mulai_pekerjaan->format('n') == (int)$month;
            });
        }

        $grouped = $laporanCollection->groupBy(function ($item) {
            return $item->mulai_pekerjaan->format('Y-m-d');
        });

        $laporan = $grouped->map(function ($items, $date) {
            return [
                'tanggal' => $date,
                'deskripsi' => $items->pluck('deskripsi')->filter()->implode('; '),
            ];
        })->values();

        return response()->json(['laporan' => $laporan]);
    }

}
