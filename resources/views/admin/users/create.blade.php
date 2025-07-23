@extends('layouts.app')

@section('content')
<div class="content-header">Users/Add</div>
<p>Buat Pengguna baru.</p>
<div class="row">
    <div class="col-md-12">
        <div class="card main-card bg-users">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Users</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employee ID</label>
                        <input type="text" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" value="{{ old('employee_id') }}">
                        @error('employee_id')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                            <option value="">-- Change</option>
                            <option value="admin" @selected(old('role') == 'admin')>Admin</option>
                            <option value="supervisor" @selected(old('role') == 'supervisor')>Supervisor</option>
                            <option value="operator" @selected(old('role') == 'operator')>Operator</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
            
@section('styles')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<style>
    .bg-users {
        background-color: var(--bg-secondary);
    }
</style>
@endsection

@section('scripts')
    @include('datatable')
    @include('alerts')
@endsection