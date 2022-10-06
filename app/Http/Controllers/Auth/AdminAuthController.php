<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => "required|exists:admins,email",
            'password' => "required"
        ]);

        $credentials = request()->only('email', 'password');
        $authenticated = auth()->guard('admin')->attempt($credentials, $request->has('is_remember'));

        if ($authenticated){
            return redirect()->intended('/admin/dashboard');
        }

        if (!$authenticated){
            return redirect()->back()->with('error', 'email atau password salah');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route("admin-auth.index")->with('success', 'Berhasil keluar');
    }
}
