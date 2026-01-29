<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminRequestController extends Controller
{
    // form pengajuan
    public function create()
    {
        return view('admin.apply');
    }

    // simpan pengajuan
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email',
            'reason' => 'required'
        ]);

        AdminRequest::create($request->only('name','email','reason'));

        return redirect()->route('dashboard')
            ->with('success', 'Pengajuan admin berhasil dikirim');
    }

    // list pengajuan (super admin)
    public function index()
    {
        return view('admin.requests', [
            'requests' => AdminRequest::where('status','pending')->get()
        ]);
    }

    // approve
    public function approve($id)
    {
        $req = AdminRequest::findOrFail($id);

        User::create([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => Hash::make('admin123'),
            'role'     => 'admin'
        ]);

        $req->update(['status' => 'approved']);

        return back()->with('success','Admin disetujui');
    }

    // reject
    public function reject($id)
    {
        AdminRequest::findOrFail($id)
            ->update(['status' => 'rejected']);

        return back()->with('error','Pengajuan ditolak');
    }
}
