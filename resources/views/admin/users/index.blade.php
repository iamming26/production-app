@extends('layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-2">Users</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary mb-2 col-1">+ Add</a>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-striped">
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
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->employee_id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->employee_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    @include('alerts')
@endsection