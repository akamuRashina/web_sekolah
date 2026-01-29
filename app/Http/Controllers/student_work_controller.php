<?php

namespace App\Http\Controllers;

use App\Models\StudentWork;
use App\Models\Major;
use Illuminate\Http\Request;

class StudentWorkController extends Controller
{
    public function index()
    {
        $studentWorks = StudentWork::with('major')->get();
        return view('student_works.index', compact('studentWorks'));
    }

    // ===== EDIT =====
    public function edit($id)
    {
        $studentWork = StudentWork::findOrFail($id);
        $majors = Major::all();

        return view('student_works.edit', compact('studentWork', 'majors'));
    }

    // ===== UPDATE =====
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_of_work' => 'required',
            'description' => 'required',
            'file_of_work' => 'required',
            'id_major' => 'required'
        ]);

        $studentWork = StudentWork::findOrFail($id);
        $studentWork->update($request->all());

        return redirect('/student-works')->with('success', 'Data berhasil diupdate');
    }

    // ===== DELETE =====
    public function destroy($id)
    {
        $studentWork = StudentWork::findOrFail($id);
        $studentWork->delete();

        return redirect('/student-works')->with('success', 'Data berhasil dihapus');
    }
}
