@extends('layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-2">Users</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary mb-2 col-1">+ Add</a>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-striped" id="data_table">
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
                    @foreach($list_users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->employee_id }}</td>
                            <td>{{ strtoupper($user->name) }}</td>
                            <td>{{ strtoupper($user->role) }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->employee_id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form id="delete-user-form-{{ $user->employee_id }}" 
                                    action="{{ route('admin.users.destroy', $user->employee_id) }}" 
                                    method="POST" 
                                    class="d-inline delete-user-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmDelete(event, 'delete-user-form-{{ $user->employee_id }}')">
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
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('footer')
    @include('datatable')
    @include('alerts')
@endsection