<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Lot;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> dev-romi
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;  

class LotController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        try {
            DB::beginTransaction();

            $lots = Lot::select('id', 'lot_id', 'qty', 'qty_remaining', 'status')->paginate(10);

            DB::commit();
            return view('supervisor.lot.index', [
                'lots' => $lots,
            ]);

        } catch (Throwable $e) {
            DB::rollBack();

            return redirect()->route('lot.index')
                ->withErrors(['error' => 'Gagal mengambil data: ' . $e->getMessage()]);
        }

=======
        $lots = Lot::select('lot_id', 'qty', 'qty_remaining', 'status')
            ->orderBy('lot_id', 'asc')
            ->get();

        return view('supervisor.lot.index', [
            'lots' => $lots,
            'user' => Auth::user(),
        ]);
>>>>>>> dev-romi
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
