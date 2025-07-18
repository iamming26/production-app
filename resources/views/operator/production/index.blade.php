@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Lot</h5>
        <span>
            <a href="{{ route('supervisor.lot.create') }}" class="btn btn-primary btn-sm">+ Add</a>
        </span>
        </div>
        <div class="card-body">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Lot ID</th>
                    <th>Stock</th>
                </tr>
                </thead>
                <tbody>
                @forelse($lots as $lot)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lot->lot_id }}</td>
                    <td>{{ $lot->qty_remaining }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Data is empty.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $lots->links() }}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('alerts')
@endsection