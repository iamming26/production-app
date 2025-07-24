@extends('layouts.app')

@section('content')
<div class="content-header">Users</div>
<p>Daftar penggunga sistem.</p>
<div class="row">
    <div class="col-md-12">
        <div class="card main-card bg-users">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Users</h5>
            <span>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">+ Add</a>
            </span>
            </div>
            <div class="card-body">
                <table class="table table-sm my-table" id="data_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_users as $usr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $usr->employee_id }}</td>
                                <td>{{ strtoupper($usr->name) }}</td>
                                <td>{{ strtoupper($usr->role) }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $usr->employee_id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form id="delete-user-form-{{ $usr->employee_id }}" 
                                        action="{{ route('admin.users.destroy', $usr->employee_id) }}" 
                                        method="POST" 
                                        class="d-inline delete-user-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="confirmDelete(event, 'delete-user-form-{{ $usr->employee_id }}')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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