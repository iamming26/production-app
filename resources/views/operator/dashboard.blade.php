@extends('layouts.app')

@section('content')
    <div class="card main-card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Operator Dashboard</h5>
        </div>
        <div class="card-body">
            <p>Welcome to the Operator Dashboard. Here you can input production data and manage lots.</p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('operator.production.create') }}" class="btn btn-primary btn-sm">Input Production</a>
            </div>
        </div>
    </div>
@endsection