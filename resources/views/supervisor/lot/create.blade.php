@extends('layouts.app')

@section('content')
  <div class="card main-card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Add Work Center</h5>
    </div>
    <div class="card-body">
        
    <form action="{{ route('supervisor.lot.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="lot_id" class="form-label">Lot ID</label>
            <input type="text" class="form-control @error('lot_id') is-invalid @enderror" id="lot_id" name="lot_id" value="{{ old('lot_id') }}">
            @error('lot_id')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">QTY</label>
            <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty') }}">
            @error('qty')
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

@section('scripts')
    @include('alerts')
@endsection