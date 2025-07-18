<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'employee_id' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'supervisor') {
                return redirect()->route('supervisor.dashboard');
            } elseif ($role === 'operator') {
                return redirect()->route('operator.dashboard');
            }
        }

        return back()->withErrors([
            'employee_id' => 'ID atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

