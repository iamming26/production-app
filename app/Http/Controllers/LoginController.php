<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'supervisor') {
                return redirect()->route('supervisor.dashboard');
            } elseif ($user->role === 'operator') {
                return redirect()->route('operator.dashboard');
            }
        }

        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'employee_id' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return match ($user->role) {
                'admin' => redirect()->intended('/admin/dashboard'),
                'supervisor' => redirect()->intended('/supervisor/dashboard'),
                'operator' => redirect()->intended('/operator/dashboard'),
                default => redirect()->intended('/dashboard'),
            };
        }

        return back()->withErrors([
            'employee_id' => 'The provided credentials do not match our records.',
        ])->onlyInput('employee_id');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}