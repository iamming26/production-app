@extends('layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Create User</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $editUser->employee_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee ID</label>
                <input type="text" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" value="{{ old('employee_id', $editUser->employee_id) }}" readonly>
                @error('employee_id')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $editUser->name) }}">
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
                    <option value="admin" @selected(old('role', $editUser->role) == 'admin')>Admin</option>
                    <option value="supervisor" @selected(old('role', $editUser->role) == 'supervisor')>Supervisor</option>
                    <option value="operator" @selected(old('role', $editUser->role) == 'operator')>Operator</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('alerts')
@endsection