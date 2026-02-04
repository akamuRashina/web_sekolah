<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\extracurricular;
use App\Http\Requests\extracurricular\storeextracurricularrequest;
use App\Http\Requests\extracurricular\updateextracurricularrequest;


class extracurricularcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurricular = extracurricular::latest()->paginate(10);
        return view ('admin.extracurricular.index',compact('extracurricular'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.extracurricular.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeextracurricularrequest $request)
    {
        extracurricular::create($request->validated());
        return redirect()->back()->with('success', 'extracurricular berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(extracurricular $extracurricular)
    {
        return view ('admin.extracurricular.show', compact('extracurricular'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(extracurricular $extracurricular)
    {
        return view ('admin.extracurricular.edit', compact('extracurricular'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateextracurricularrequest $request, extracurricular $extracurricular)
    {
        $extracurricular->update($request->validated());
        return redirect()->back()->with('succes', 'extracurricular berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( extracurricular $extracurricular)
    {
        $extracurricular->delete();
         return redirect()->back()->with('succes', 'extracurricular berhasil di hapus');
    }
}
