<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\WorkCenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;  

class WorkCenterController extends Controller
{
    public function index()
    {
        $workcenters = WorkCenter::select('code', 'name', 'desc')
            ->orderBy('code', 'asc')
            ->get();

        return view('supervisor.work-center.index', [
            'workcenters' => $workcenters,
            'user' => Auth::user(),
        ]);

    }

    public function create()
    {   
        return view('supervisor.work-center.create', [
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {
         $validated = $request->validate([
                'code' => 'required|string|unique:work_centers,code',
                'name' => 'required|string',
                'desc' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            WorkCenter::create($validated);

            DB::commit();
            return redirect()->route('supervisor.work-center')->with('success', 'WorkCenter berhasil disimpan.');

        } catch (Throwable $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan WorkCenter: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])
                ->withInput();
        }
    }
}
