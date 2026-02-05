<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /* ===== LOGIN ===== */
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    /* ===== REGISTER ===== */
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // KIRIM EMAIL (kalau SMTP sudah diset)
        Mail::raw(
            "Halo {$user->name}, akun kamu berhasil dibuat 🎉",
            function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Registrasi Berhasil');
            }
        );

        return redirect('/login')->with('success', 'Akun berhasil dibuat, cek email kamu');
    }

    /* ===== EDIT PROFILE ===== */
    public function editProfile()
    {
        return view('auth.profile', [
            'user' => Auth::user()
        ]);
    }

    /* ===== UPDATE PROFILE ===== */
   public function updateProfile(Request $request)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    $request->validate([
        'name'  => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6'
    ]);

    $data = [
        'name'  => $request->name,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return back()->with('success', 'Profile updated successfully');
}


    /* ===== DELETE ACCOUNT ===== */
 public function deleteAccount(Request $request)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    Auth::logout();

    $user->delete();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Account deleted successfully');
}



    /* ===== LOGOUT ===== */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
