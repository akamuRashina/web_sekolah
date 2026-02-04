<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\performance;
use App\Http\Requests\performance\storeperformancerequest;
use App\Http\Requests\performance\updateperformancerequest;
// Import Storage untuk menghapus file lama
use Illuminate\Support\Facades\Storage;

class performancecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $performance = performance::latest()->paginate(10);
        return view('admin.performance.index', compact('performance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.performance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeperformancerequest $request)
    {
        // Ambil data yang sudah divalidasi
        $validatedData = $request->validated();

        // LOGIKA TAMBAHAN: Proses Upload Gambar
        if ($request->hasFile('image')) {
            // Simpan file ke storage/app/public/performances
            $path = $request->file('image')->store('performances', 'public');
            // Masukkan path file ke dalam array data yang akan disimpan
            $validatedData['image'] = $path;
        }

        performance::create($validatedData);

        // Redirect ke index (bukan back) agar langsung melihat hasilnya di tabel
        return redirect()->route('performance.index')->with('success', 'performance berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(performance $performance)
    {
        return view('admin.performance.show', compact('performance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(performance $performance)
    {
        return view('admin.performance.edit', compact('performance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateperformancerequest $request, performance $performance)
    {
        // Ambil data yang sudah divalidasi
        $validatedData = $request->validated();

        // LOGIKA TAMBAHAN: Proses Update Gambar
        if ($request->hasFile('image')) {
            // 1. Hapus gambar lama dari folder storage jika ada
            if ($performance->image && Storage::disk('public')->exists($performance->image)) {
                Storage::disk('public')->delete($performance->image);
            }

            // 2. Simpan gambar baru
            $path = $request->file('image')->store('performances', 'public');
            $validatedData['image'] = $path;
        }

        $performance->update($validatedData);

        return redirect()->route('performance.index')->with('success', 'performance berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(performance $performance)
    {
        // LOGIKA TAMBAHAN: Hapus file dari storage saat data dihapus
        if ($performance->image && Storage::disk('public')->exists($performance->image)) {
            Storage::disk('public')->delete($performance->image);
        }

        $performance->delete();
        return redirect()->back()->with('success', 'performance berhasil di hapus');
    }
}