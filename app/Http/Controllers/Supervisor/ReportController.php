<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Models\Production;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> dev-romi

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Production::query();

        // Filter berdasarkan tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        // Filter shift
        if ($request->filled('shift')) {
            $query->where('shift', $request->shift);
        }

        // Ambil data
        $productions = $query->with(['workcenter', 'lot'])->get();

<<<<<<< HEAD
        return view('supervisor.report.index', compact('productions'));
=======
        return view('supervisor.report.index', [
            'productions' => $productions,
            'user' => Auth::user(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'shift' => $request->shift,
        ]);
>>>>>>> dev-romi
    }

    public function detail()
    {
<<<<<<< HEAD
        return view('supervisor.report.detail');
=======
        return view('supervisor.report.detail', [
            'user' => Auth::user(),
        ]);
>>>>>>> dev-romi
    }
}
