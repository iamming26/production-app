<?php

namespace App\Http\Controllers\Operator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Production;
use App\Models\WorkCenter;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable; 

class ProductionController extends Controller
{
    public function index()
    {
        try {
            DB::beginTransaction();

            $productions = Production::select('*')->paginate(10);

            DB::commit();
            return view('operator.production.index', [
                'productions' => $productions,
            ]);

        } catch (Throwable $e) {
            DB::rollBack();

            return redirect()->route('operator.production.index')
                ->withErrors(['error' => 'Gagal mengambil data: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        $lots = Lot::where('status', 'available')->get();
        $workcenters = WorkCenter::all();

        //get shift based on current time
        $shift = $this->getShiftByTime();

        return view('operator.production.create', [
            'lots' => $lots,
            'workcenters' => $workcenters,
            'shift' => $shift,
            'date' => Carbon::now()->format('Y-m-d'),
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
            'shift' => 'required',
            'workcenter' => 'required',
            'lot' => 'required',
            'qty' => 'required|integer|min:1',
            'employee_id' => 'required',
        ]);

        //check qty lots
        $lot = Lot::where('lot_id', $request->input('lot'))->firstOrFail();
        if ($lot->qty_remaining < $request->input('qty')) {
            return redirect()->back()->with('errorQTY', 'Qty yang dimasukkan melebihi qty remaining lot.')->withInput();
        }

        DB::beginTransaction();
        try {
            // insert production data
            Production::create([
                'date' => $request->input('date'),
                'shift' => $request->input('shift'),
                'workcenter_id' => $request->input('workcenter'),
                'lot_id' => $request->input('lot'),
                'qty_output' => $request->input('qty'),
                'operator_id' => $request->input('employee_id'),
                'note' => $request->input('note', null),
            ]);

            // update lot qty remaining & status if 0 qty remaining
            $lot = Lot::where('lot_id', $request->input('lot'))->firstOrFail();
            $lot->qty_remaining -= $request->input('qty');
            if ($lot->qty_remaining <= 0) {
                $lot->qty_remaining = 0;
                $lot->status = 'consumed';
            } else {
                $lot->status = 'available';
            }
            $lot->save();

            DB::commit();
            return redirect()->back()->with('success', 'Proses produksi berhasil.');

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan Lot: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])
                ->withInput();
        }
    }

    protected function getShiftByTime()
    {
        // now timezone Asia/Jakarta
        $now = Carbon::now('Asia/Jakarta');

        // start and end time for each shift
        $shift1_start = $now->copy()->setTime(8, 0);
        $shift1_end   = $now->copy()->setTime(16, 0);

        $shift2_start = $now->copy()->setTime(16, 0);
        $shift2_end   = $now->copy()->addDay()->setTime(0, 0);

        $shift3_start = $now->copy()->setTime(0, 0);
        $shift3_end   = $now->copy()->setTime(8, 0);

        if ($now->between($shift1_start, $shift1_end)) {
            return 'Shift 1';
        } elseif ($now->between($shift2_start, $shift2_end)) {
            return 'Shift 2';
        } elseif ($now->between($shift3_start, $shift3_end)) {
            return 'Shift 3';
        }
    }
}
