<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Http\Requests\major\MajorRequest;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::latest()->paginate(10);
        return view('admin.major.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorRequest $request)
    {
        Major::create($request->validated());

        return redirect()
            ->route('major.index')
            ->with('success', 'Data major berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return view('admin.major.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('admin.major.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, Major $major)
    {
        $major->update($request->validated());

        return redirect()
            ->route('major.index')
            ->with('success', 'Data major berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return redirect()
            ->back()
            ->with('success', 'Data major berhasil dihapus');
    }
}
