<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\WorkCenter;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> dev-romi
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;  

class WorkCenterController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        try {
            DB::beginTransaction();

            $workcenters = WorkCenter::select('id', 'code', 'name', 'desc')->paginate(10);

            DB::commit();
            return view('supervisor.work-center.index', [
                'workcenters' => $workcenters,
            ]);

        } catch (Throwable $e) {
            DB::rollBack();

            return redirect()->route('supervisor.work-center.index')
                ->withErrors(['error' => 'Gagal mengambil data: ' . $e->getMessage()]);
        }
=======
        $workcenters = WorkCenter::select('code', 'name', 'desc')
            ->orderBy('code', 'asc')
            ->get();

        return view('supervisor.work-center.index', [
            'workcenters' => $workcenters,
            'user' => Auth::user(),
        ]);
>>>>>>> dev-romi

    }

    public function create()
<<<<<<< HEAD
    {
        return view('supervisor.work-center.create');
=======
    {   
        return view('supervisor.work-center.create', [
            'user' => Auth::user(),
        ]);
>>>>>>> dev-romi
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
