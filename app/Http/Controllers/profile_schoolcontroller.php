<?php

namespace App\Http\Controllers;

use App\Models\App\Models\profile_school;
use App\Models\profile_school as ModelsProfile_school;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSchoolController extends Controller
{
    public function index()
    {
        return ModelsProfile_school::first(); // memang biasanya cuma 1 data
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'school_name',
            'description',
            'address',
            'principal_name',
            'number_of_students',
            'vision',
            'mission',
            'history',
        ]);

        if ($request->hasFile('principal_photo')) {
            $data['principal_photo'] = $request->file('principal_photo')
                ->store('principals', 'public');
        }

        ModelsProfile_school::create($data);

        return back()->with('success', 'Profil sekolah berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $profile = ModelsProfile_school::findOrFail($id);

        $data = $request->only([
            'school_name',
            'description',
            'address',
            'principal_name',
            'number_of_students',
            'vision',
            'mission',
            'history',
        ]);

        if ($request->hasFile('principal_photo')) {
            if ($profile->principal_photo) {
                Storage::disk('public')->delete($profile->principal_photo);
            }

            $data['principal_photo'] = $request->file('principal_photo')
                ->store('principals', 'public');
        }

        $profile->update($data);

        return back()->with('success', 'Profil sekolah berhasil diperbarui');
    }
}
