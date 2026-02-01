<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\partner;
use Illuminate\Http\Request;

class partnercontroller extends Controller
{
    // list data
    public function index()
    {
        $partners = partner::all();
        return view('admin.partner.index', compact('partners'));
    }

    // form edit
    public function edit($id)
    {
        $partner = partner::findOrFail($id);
        return view('admin.partner.edit', compact('partner'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $partner = partner::findOrFail($id);

        $partner->update([
            'name' => $request->name,
            'field' => $request->field,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('partner.index')
            ->with('success', 'data updated');
    }

    // delete data
    public function destroy($id)
    {
        partner::findOrFail($id)->delete();

        return redirect()->route('partner.index')
            ->with('success', 'data deleted');
    }
}
