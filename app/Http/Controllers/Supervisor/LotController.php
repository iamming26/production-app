<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Lot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;  

class LotController extends Controller
{
    public function index()
    {
        $lots = Lot::select('lot_id', 'qty', 'qty_remaining', 'status')
            ->orderBy('lot_id', 'asc')
            ->get();

        return view('supervisor.lot.index', [
            'lots' => $lots,
            'user' => Auth::user(),
        ]);
    }

    public function create()
    {
        return view('supervisor.lot.create');
    }

    public function store(Request $request)
    {
         $validated = $request->validate([
                'lot_id' => 'required|string|unique:lots,lot_id',
                'qty' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            Lot::create([
                'lot_id' => $validated['lot_id'],
                'qty' => $validated['qty'],
                'qty_remaining' => $validated['qty'],
                'status' => 'available',
            ]);

            DB::commit();
            return redirect()->route('supervisor.lot')->with('success', 'Lot berhasil disimpan.');

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan Lot: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])
                ->withInput();
        }
    }
}
