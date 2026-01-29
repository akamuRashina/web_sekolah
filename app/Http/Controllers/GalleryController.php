<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Ambil semua data galeri
    public function index()
    {
        return Gallery::all();
    }

    // Simpan data galeri
    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required|string',
            'Foto' => 'required|string',
            'Keterangan' => 'required|string',
        ]);

        $gallery = Gallery::create([
            'Judul' => $request->Judul,
            'Foto' => $request->Foto,
            'Keterangan' => $request->Keterangan,
        ]);

        return response()->json($gallery, 201);
    }

    // Tampilkan 1 data galeri
    public function show($id)
    {
        return Gallery::findOrFail($id);
    }

    // Update data galeri
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $gallery->update($request->only([
            'Judul',
            'Foto',
            'Keterangan'
        ]));

        return response()->json($gallery);
    }

    // Hapus data galeri
    public function destroy($id)
    {
        Gallery::destroy($id);

        return response()->json([
            'message' => 'Data galeri berhasil dihapus'
        ]);
    }
}
