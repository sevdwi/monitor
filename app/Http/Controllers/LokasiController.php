<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::with('opd')->get();
        return response()->json($lokasis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'koordinat' => 'nullable|string|max:100',
            'opd_id' => 'required|exists:opds,id',
        ]);

        $lokasi = Lokasi::create($request->all());

        return response()->json([
            'message' => 'Lokasi berhasil disimpan',
            'data' => $lokasi
        ]);
    }


    public function show($id)
    {
        $lokasi = Lokasi::with('opd')->findOrFail($id);
        return response()->json($lokasi);
    }

    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'koordinat' => 'nullable|string|max:255',
            'opd_id' => 'required|exists:opds,id',
        ]);

        $lokasi->update($validated);

        return response()->json($lokasi);
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return response()->json(['message' => 'Deleted']);
    }

    public function getByOpd($opd)
    {
        $lokasis = Lokasi::where('opd_id', $opd)->with('opd')->get();
    }
}
