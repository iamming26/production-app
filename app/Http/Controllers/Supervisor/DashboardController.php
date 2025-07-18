<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
>>>>>>> dev-romi

class DashboardController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('supervisor.dashboard');
=======
        $start_date = Carbon::today()->subDays(5)->format('Y-m-d');
        $end_date = Carbon::today()->format('Y-m-d');

        $productions = $this->getProductionData($start_date, $end_date);
        $dates = $this->getDateProductions($productions);
        $values_productions = $this->getValueProductions($productions);

        $shift = ['Shift 1', 'Shift 2', 'Shift 3'];

        return view('supervisor.dashboard', [
            'user' => Auth::user(),
            'data' => [
                'dates' => $dates,
                'shifts' => $shift,
                'values' => $values_productions,
            ]
        ]);
    }

    protected function getProductionData($start, $end)
    {
        $productions = DB::table('productions')
            ->select('date', 'shift', DB::raw('SUM(qty_output) as total_quantity'))
            ->whereBetween('date', [$start, $end])
            ->groupBy('date', 'shift')
            ->orderBy('date', 'asc')
            ->get();

        return $productions;
    }

    protected function getDateProductions($productions)
    {
        return $productions->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        })
        ->unique()
        ->values()
        ->toArray();
    }

    protected function getValueProductions($productions)
    {
        $values = [];
        foreach ($productions as $production) {
            $values[$production->date][$production->shift] = $production->total_quantity;
        }

        return $values;
>>>>>>> dev-romi
    }
}
