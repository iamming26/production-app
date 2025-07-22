<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> dev-romi

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('admin.dashboard');
=======
        
        return view('admin.dashboard', [
            'user' => Auth::user(),
        ]);
>>>>>>> dev-romi
    }
}
