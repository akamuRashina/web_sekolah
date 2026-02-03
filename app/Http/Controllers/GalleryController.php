<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        return view('gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required|string|max:255',
            'Foto' => 'required|image|mimes:jpg,jpeg,png',
            'Keterangan' => 'required|string',
        ]);

        $fotoPath = $request->file('Foto')->store('gallery', 'public');

        Gallery::create([
            'Judul' => $request->Judul,
            'Foto' => $fotoPath,
            'Keterangan' => $request->Keterangan,
        ]);

        return redirect('/gallery');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'Judul' => 'required|string|max:255',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png',
            'Keterangan' => 'required|string',
        ]);

        if ($request->hasFile('Foto')) {
            $fotoPath = $request->file('Foto')->store('gallery', 'public');
            $gallery->Foto = $fotoPath;
        }

        $gallery->Judul = $request->Judul;
        $gallery->Keterangan = $request->Keterangan;
        $gallery->save();

        return redirect('/gallery');
    }

    public function destroy($id)
    {
        Gallery::destroy($id);
        return redirect('/gallery');
    }
}
