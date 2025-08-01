@extends('layouts.app')

@section('content')
    <div class="card main-card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Lot</h5>
        <span>
            <a href="{{ route('supervisor.lot.create') }}" class="btn btn-primary btn-sm">+ Add</a>
        </span>
        </div>
        <div class="card-body">
            <table class="table table-hover my-table mb-0" id="data_table">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Lot ID</th>
                    <th>Stock</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse($lots as $lot)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lot->lot_id }}</td>
                    <td>{{ $lot->qty_remaining }}</td>
                    <td>
                    @if ($lot->status === 'available')
                        <span class="badge text-bg-success">Available</span>
                    @elseif ($lot->status === 'consumed')
                        <span class="badge text-bg-warning">Consumed</span>
                    @elseif ($lot->status === 'closed')
                        <span class="badge text-bg-danger">Closed</span>
                    @else
                        <span class="badge text-bg-secondary">{{ ucfirst($lot->status) }}</span>
                    @endif
                </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Data is empty.</td>
                </tr>
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