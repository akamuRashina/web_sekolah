<?php

namespace App\Http\Controllers;

use App\Http\Requests\teachers\StoreTeacherRequest;
use App\Models\Teacher;
use App\Http\Requests\teachers\UpdateTeacherRequest;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    // =========================
    // LIST / DASHBOARD
    // =========================
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function create()
    {
        return view('teachers.create');
    }

    // =========================
    // SIMPAN (TIDAK DIUBAH)
    // =========================
    public function store(StoreTeacherRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create($data);

        return back()->with('success', 'Data guru berhasil ditambahkan');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    // =========================
    // UPDATE (TIDAK DIUBAH)
    // =========================
    public function update(UpdateTeacherRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }

            $data['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($data);

        return back()->with('success', 'Data guru berhasil diperbarui');
    }

    // =========================
    // DELETE (TIDAK DIUBAH)
    // =========================
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return back()->with('success', 'Data guru dihapus');
    }
}
