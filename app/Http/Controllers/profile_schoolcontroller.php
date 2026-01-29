<?php

namespace App\Http\Controllers;
use App\Models\profile_school;
use Illuminate\Http\Request;

class ProfileSchoolController extends Controller
{
     public function index()
    {
        return profile_school::first(); // biasanya cuma 1 profil sekolah
    }

    public function store(Request $request)
    {
        profile_school::create($request->all());
        return back()->with('success', 'Profil sekolah berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $profile = profile_school::findOrFail($id);
        $profile->update($request->all());

        return back()->with('success', 'Profil sekolah berhasil diperbarui');
    }
}
