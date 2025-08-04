<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\OPD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OPDController extends Controller
{
    public function index()
    {
        $opds = OPD::all();
        // Ambil jumlah laporan per kategori
        $kategoriCounts = Laporan::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori');

        // Ambil jumlah laporan per kategori dan status
        $statusPerKategori = Laporan::select('kategori', 'status_pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('kategori', 'status_pekerjaan')
            ->get()
            ->groupBy('kategori');
        return view('pages.OPD', compact('opds', 'kategoriCounts', 'statusPerKategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:10|unique:opds,kode',
        ]);

        $opd = OPD::create($request->all());
        return response()->json($opd, 201);
    }

    public function show(OPD $id)
    {
        $opd = OPD::findOrFail($id);
        return response()->json($opd);
    }

    public function update(Request $request, $id)
    {
        $opd = OPD::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:10',
        ]);

        $opd->update($request->all());
        return response()->json($opd);
    }

    public function destroy($id)
    {
        $opd = OPD::findOrFail($id);
        $opd->delete();

        return response()->json(['message' => 'OPD berhasil dihapus.']);
    }
}
