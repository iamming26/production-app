<?php

namespace App\Http\Controllers\Operator;

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
        return view('operator.dashboard');
=======
        return view('operator.dashboard', [
            'user' => Auth::user(),
        ]);
>>>>>>> dev-romi
    }
}
