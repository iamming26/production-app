<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Production;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductionSummaryController extends Controller
{
    public function index(Request $request)
    {

        // Validasi awal
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        // Konversi ke Carbon instance
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        // Validasi max 31 hari
        if ($start->diffInDays($end) > 30) {
            return response()->json([
                'message' => 'Rentang tanggal tidak boleh lebih dari 31 hari.'
            ], 422);
        }

        // Ambil data produksi berdasarkan range tanggal
        $productions = Production::whereBetween('date', [$start->toDateString(), $end->toDateString()])->get();

        return response()->json([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'count' => $productions->count(),
            'data' => $productions
        ]);
    }

}
