<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\partner;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class partnercontroller extends Controller
{
    public function index()
    {
        $partners = partner::latest()->paginate(10);
        return view('admin.partner.index', compact('partners'));
    }
  public function store(Request $request)
    {
        $partner = partner::create($request->all());
        return redirect()
            ->route('partner.index')
            ->with('success', 'data berhasil disimpan');
    }  
     
    public function create()
    {
       // $partner = partner::findOrFail();
        return view('admin.partner.create');
    }

    public function edit($id)
    {
        $partner = partner::findOrFail($id);
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = partner::findOrFail($id);

        $partner->update([
            'name'   => $request->name,
            'field'  => $request->field,
            'email'  => $request->email,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('partner.index')
            ->with('success', 'data berhasil diupdate');
    }

    public function destroy($id)
    {
        $partner = partner::findOrFail($id);
        $partner->delete();

        return redirect()
            ->route('partner.index')
            ->with('success', 'data berhasil dihapus');
    }
}
