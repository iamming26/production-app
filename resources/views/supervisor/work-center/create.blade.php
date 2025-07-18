@extends('layout')

@section('content')
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Add Work Center</h5>
    </div>
    <div class="card-body">
        
    <form action="{{ route('supervisor.work-center.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
            @error('code')
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
            <label for="desc" class="form-label">Desc</label>
            <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" value="{{ old('desc') }}">
            @error('desc')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-success">Proses</button>
        </div>
    </form>

    </div>
</div>  
@endsection

@section('footer')
    @include('alerts')
@endsection