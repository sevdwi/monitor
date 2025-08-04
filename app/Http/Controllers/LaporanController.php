<?php

namespace App\Http\Controllers;

use App\Models\Kolaborator;
use App\Models\Laporan;
use App\Models\Lokasi;
use App\Models\OPD;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with(['opd', 'lokasi', 'pics'])->latest()->get();
        $opds = OPD::all();
        $lokasis = Lokasi::all();
        $users = User::all();
        $kolaborators = Kolaborator::all();

        // Ambil jumlah laporan per kategori
        $kategoriCounts = Laporan::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // Ambil jumlah laporan per kategori dan status
        $statusPerKategori = Laporan::select('kategori', 'status_pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('kategori', 'status_pekerjaan')
            ->get()
            ->groupBy('kategori');

        return view('pages.home', compact(
            'laporans',
            'opds',
            'lokasis',
            'users',
            'kolaborators',
            'kategoriCounts',
            'statusPerKategori'
        ));
    }

    public function create()
    {
        $opds = OPD::all();
        $lokasis = Lokasi::all();
        $users = User::all();
        $kolaborators = Kolaborator::all();

        // Ambil jumlah laporan per kategori
        $kategoriCounts = Laporan::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // Ambil jumlah laporan per kategori dan status
        $statusPerKategori = Laporan::select('kategori', 'status_pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('kategori', 'status_pekerjaan')
            ->get()
            ->groupBy('kategori');

        return view('pages.lapor', compact('opds', 'lokasis', 'users', 'kolaborators', 'kategoriCounts', 'statusPerKategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_pekerjaan' => 'required|in:belum,proses,selesai,tertunda',
            'mulai_pekerjaan' => 'required|date',
            'selesai_pekerjaan' => 'nullable|date|after_or_equal:mulai_pekerjaan',
            'deskripsi' => 'required|string',
            'bukti_dukung' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bukti_url' => 'nullable|url',
            'opd' => 'required|exists:opds,id',
            'lokasi' => 'required|exists:lokasis,id',
            'kategori' => 'required|in:aplikasi,infrastruktur,jaringan',
            'analisis_masalah' => 'nullable|string',
            'solusi' => 'nullable|string',
            'penggunaan_perangkat' => 'nullable|boolean',
            'perangkat' => 'nullable|string',
            'status_perangkat' => 'nullable|in:baru,bekas',
            'pic' => 'nullable|array',
            'pic.*' => 'exists:users,id',
            'kolaborator' => 'nullable|array',
            'kolaborator.*' => 'exists:kolaborators,id',
        ]);

        // Upload file bukti dukung jika ada
        if ($request->hasFile('bukti_dukung')) {
            $path = $request->file('bukti_dukung')->store('bukti_dukung', 'public');
            $validated['bukti_dukung'] = $path;
        }

        // Simpan laporan
        $laporan = Laporan::create([
            'status_pekerjaan' => $validated['status_pekerjaan'],
            'mulai_pekerjaan' => $validated['mulai_pekerjaan'],
            'selesai_pekerjaan' => $validated['selesai_pekerjaan'] ?? null,
            'deskripsi' => $validated['deskripsi'],
            'bukti_dukung' => $validated['bukti_dukung'] ?? null,
            'bukti_url' => $validated['bukti_url'] ?? null,
            'opd_id' => $validated['opd'],
            'lokasi_id' => $validated['lokasi'],
            'kategori' => $validated['kategori'],
            'analisis_masalah' => $validated['analisis_masalah'] ?? null,
            'solusi' => $validated['solusi'] ?? null,
            'penggunaan_perangkat' => $request->has('penggunaan_perangkat') ? true : false,
            'perangkat' => $validated['perangkat'] ?? null,
            'status_perangkat' => $validated['status_perangkat'] ?? null,
            'created_by' => auth()->id() ?? 1, // pakai user id login, kalau belum login ganti 1
        ]);

        // Sync PIC (many to many)
        if (!empty($validated['pic'])) {
            $laporan->pics()->sync($validated['pic']);
        }

        // Kalau kamu mau simpan kolaborator juga, buat relasi dan sync (misal)
        if (!empty($validated['kolaborator'])) {
            // pastikan Laporan punya relasi kolaborator jika mau pakai ini
             $laporan->kolaborators()->sync($validated['kolaborator']);
        }

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dibuat!');

    }

    public function edit($id)
    {
        $laporans = collect([
            Laporan::with(['pics', 'kolaborators'])->findOrFail($id)
        ]);

        $opds = OPD::all();
        $lokasis = Lokasi::all();
        $users = User::all();
        $kolaborators = Kolaborator::all();

        return view('pages.home', compact(
            'laporans',
            'opds',
            'lokasis',
            'users',
            'kolaborators'
        ));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $validated = $request->validate([
            'status_pekerjaan' => 'required|in:belum,proses,selesai,tertunda',
            'mulai_pekerjaan' => 'required|date',
            'selesai_pekerjaan' => 'nullable|date|after_or_equal:mulai_pekerjaan',
            'deskripsi' => 'required|string',
            'bukti_dukung' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'bukti_url' => 'nullable|url',
            'opd' => 'required|exists:opds,id',
            'lokasi' => 'required|exists:lokasis,id',
            'kategori' => 'required|in:aplikasi,infrastruktur,jaringan',
            'analisis_masalah' => 'nullable|string',
            'solusi' => 'nullable|string',
            'penggunaan_perangkat' => 'present|nullable|boolean',
            'perangkat' => 'nullable|required_if:penggunaan_perangkat,1|string',
            'status_perangkat' => 'nullable|required_if:penggunaan_perangkat,1|in:baru,bekas',
            'pic' => 'nullable|array',
            'pic.*' => 'exists:users,id',
            'kolaborator' => 'nullable|array',
            'kolaborator.*' => 'exists:kolaborators,id',
        ]);

        // Update data dasar
        $laporan->update([
            'status_pekerjaan' => $validated['status_pekerjaan'],
            'mulai_pekerjaan' => $validated['mulai_pekerjaan'],
            'selesai_pekerjaan' => $validated['selesai_pekerjaan'] ?? null,
            'deskripsi' => $validated['deskripsi'],
            'bukti_url' => $validated['bukti_url'] ?? null,
            'opd_id' => $validated['opd'],
            'lokasi_id' => $validated['lokasi'],
            'kategori' => $validated['kategori'],
            'analisis_masalah' => $validated['analisis_masalah'] ?? null,
            'solusi' => $validated['solusi'] ?? null,
            'penggunaan_perangkat' => $request->has('penggunaan_perangkat'),
            'perangkat' => $request->penggunaan_perangkat ? $validated['perangkat'] : null,
            'status_perangkat' => $request->penggunaan_perangkat ? $validated['status_perangkat'] : null,
        ]);

        // Handle bukti_dukung jika diunggah ulang
        if ($request->hasFile('bukti_dukung')) {
            // Optional: hapus file lama
            if ($laporan->bukti_dukung) {
                Storage::delete('public/' . $laporan->bukti_dukung);
            }

            $path = $request->file('bukti_dukung')->store('images', 'public');
            $laporan->bukti_dukung = $path;
            $laporan->save();
        }

        // Sync relasi
        $laporan->pics()->sync($validated['pic'] ?? []);
        $laporan->kolaborators()->sync($validated['kolaborator'] ?? []);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }


}
