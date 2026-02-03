<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Menampilkan semua data galeri (pakai pagination)
     */
    public function index()
    {
        return response()->json(
            Gallery::orderBy('ID_Galeri', 'desc')->paginate(10)
        );
    }

    /**
     * Menyimpan data galeri baru
     */
    public function store(GalleryRequest $request)
    {
        $gallery = Gallery::create($request->validated());

        return response()->json([
            'message' => 'Data galeri berhasil ditambahkan',
            'data' => $gallery
        ], 201);
    }

    /**
     * Menampilkan 1 data galeri berdasarkan ID
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);

        return response()->json($gallery);
    }

    /**
     * Mengupdate data galeri
     */
    public function update(GalleryRequest $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->validated());

        return response()->json([
            'message' => 'Data galeri berhasil diperbarui',
            'data' => $gallery
        ]);
    }

    /**
     * Menghapus data galeri
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return response()->json([
            'message' => 'Data galeri berhasil dihapus'
        ]);
    }
}
