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
        'name' => 'required',
        'email' => 'required|email',
        'reason' => 'required',
    ]);

    AdminRequest::create([
        'name' => $request->name,
        'email' => $request->email,
        'reason' => $request->reason,
        'permissions' => json_encode($request->permissions ?? [])
    ]);

    return back()->with('success', 'Pengajuan admin terkirim');
}


// list pengajuan (super admin)
public function index()
{
    $requests = AdminRequest::where('status', 'pending')->get();

    return view('admin.requests', compact('requests'));
}


// approve admin request
public function approve($id)
{
    $requestAdmin = AdminRequest::findOrFail($id);

    $user = User::where('email', $requestAdmin->email)->first();

    if ($user) {
        $user->role = 'admin';
        $user->permissions = $requestAdmin->permissions; // simpan permission
        $user->save();
    }

    $requestAdmin->delete();

    return back()->with('success', 'Admin berhasil di-approve');
}




    // reject
    public function reject($id)
    {
        AdminRequest::findOrFail($id)
            ->update(['status' => 'rejected']);

        return back()->with('error', 'Pengajuan ditolak');
    }
}
