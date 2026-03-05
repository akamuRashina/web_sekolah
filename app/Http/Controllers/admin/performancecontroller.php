<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\performance;
use App\Http\Requests\performance\storeperformancerequest;
use App\Http\Requests\performance\updateperformancerequest;

class performancecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $performance = performance::latest()->paginate(10);
        return view ('admin.performance.index',compact('performance'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.performance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeperformancerequest $request)
    {
        performance::create($request->validated());
        return redirect()->back()->with('success', 'performance berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(performance $performance)
    {
        return view ('admin.performance.show', compact('performance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(performance $performance)
    {
        return view ('admin.performance.edit', compact('performance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateperformancerequest $request, performance $performance)
    {
        $performance->update($request->validated());
        return redirect()->back()->with('succes', 'performance berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( performance $performance)
    {
        $performance->delete();
         return redirect()->back()->with('succes', 'performance berhasil di hapus');
    }
}
