<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        return view('majors.index', compact('majors'));
    }

    // ===== EDIT =====
    public function edit($id)
    {
        $major = Major::findOrFail($id);
        return view('majors.edit', compact('major'));
    }

    // ===== UPDATE =====
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_major' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        $major = Major::findOrFail($id);
        $major->update($request->all());

        return redirect('/majors')->with('success', 'Data berhasil diupdate');
    }

    // ===== DELETE =====
    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $major->delete();

        return redirect('/majors')->with('success', 'Data berhasil dihapus');
    }
}

