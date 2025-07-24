@extends('layouts.app')

@section('content')
    <div class="card main-card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Report Productions</h5>
        <span>
            {{-- <a href="{{ route('supervisor.lot.create') }}" class="btn btn-primary btn-sm">+ Add</a> --}}
        </span>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('supervisor.report') }}" class="mb-4">
                <div class="row">
                    <div class="col">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col">
                        <label>Shift</label>
                        <select name="shift" class="form-control">
                            <option value="">-- Semua --</option>
                            <option value="Shift 1" {{ request('shift') == 'Shift 1' ? 'selected' : '' }}>Shift 1</option>
                            <option value="Shift 2" {{ request('shift') == 'Shift 2' ? 'selected' : '' }}>Shift 2</option>
                            <option value="Shift 3" {{ request('shift') == 'Shift 3' ? 'selected' : '' }}>Shift 3</option>
                        </select>
                    </div>
                    <div class="col mt-3">
                        <button type="submit" class="btn btn-primary mt-2">Filter</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered my-table" id="data_table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Shift</th>
                        <th>Workcenter</th>
                        <th>Lot</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productions as $prod)
                        <tr>
                            <td>{{ $prod->date }}</td>
                            <td>{{ $prod->shift }}</td>
                            <td>{{ $prod->workcenter->name ?? $prod->workcenter_id }}</td>
                            <td>{{ $prod->lot->name ?? $prod->lot_id }}</td>
                            <td>{{ $prod->qty_output }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('scripts')
    @include('datatable')
    @include('alerts')
@endsection