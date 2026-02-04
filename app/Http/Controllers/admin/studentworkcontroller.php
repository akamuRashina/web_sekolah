<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentWork;
use App\Http\Requests\student_work\StudentWorkRequest;

class StudentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentWorks = StudentWork::latest()->paginate(10);
        return view('admin.student_work.index', compact('studentWorks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student_work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentWorkRequest $request)
    {
        StudentWork::create($request->validated());

        return redirect()
            ->route('student_work.index')
            ->with('success', 'Data student work berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentWork $studentwork)
    {
        return view('admin.student_work.show', compact('studentwork'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentWork $studentwork)
    {
        return view('admin.student_work.edit', compact('studentwork'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentWorkRequest $request, StudentWork $studentwork)
    {
        $studentwork->update($request->validated());

        return redirect()
            ->route('student_work.index')
            ->with('success', 'Data student work berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentWork $studentwork)
    {
        $studentwork->delete();

        return redirect()
            ->back()
            ->with('success', 'Data student work berhasil dihapus');
    }
}
