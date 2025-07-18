@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Work Center</h5>
        <span>
            <a href="{{ route('supervisor.work-center.create') }}" class="btn btn-primary btn-sm">+ Add</a>
        </span>
        </div>
        <div class="card-body">
            <table class="table table-hover mb-0" id="data_table">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Work Center ID</th>
                    <th>Work Center Name</th>
                    <th>Desc</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($workcenters as $wc)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $wc->code }}</td>
                        <td>{{ $wc->name }}</td>
                        <td>{{ $wc->desc }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Data is empty.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
<<<<<<< HEAD
            <div class="d-flex justify-content-center mt-3 mt-3">
                {{ $workcenters->links() }}
            </div>
=======
>>>>>>> dev-romi
        </div>
    </div>
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('footer')
    @include('datatable')
    @include('alerts')
@endsection