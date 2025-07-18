@extends('layout')

@section('content')
  <div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Input Production</h5>
    </div>
    <div class="card-body">
        
    <form action="{{ route('operator.production.store') }}" method="POST">
        @csrf
<<<<<<< HEAD
=======
        <input type="hidden" name="employee_id" value="{{ $user->employee_id }}">
>>>>>>> dev-romi
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $date }}" readonly>
        </div>
        <div class="mb-3">
            <label for="shift" class="form-label">Shift</label>
            <input type="text" class="form-control @error('shift') is-invalid @enderror" id="shift" name="shift" value="{{ $shift }}" readonly>
        </div>
        <div class="mb-3">
            <label for="workcenter" class="form-label">Worcenter</label>
            <select class="form-select @error('workcenter') is-invalid @enderror" id="workcenter" name="workcenter">
                <option value="">--Pilih</option>
                @foreach ($workcenters as $workcenter)
                <option value="{{ $workcenter->code }}" @selected(old('workcenter') == $workcenter->code)>
                    {{ $workcenter->code }} - {{ $workcenter->name }}
                </option>
                @endforeach
            </select>
            @error('workcenter')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lot" class="form-label">Lot</label>
            <select class="form-select @error('lot') is-invalid @enderror" id="lot" name="lot">
                <option value="">--Pilih</option>
                @foreach ($lots as $lot)
                <option value="{{ $lot->lot_id }}" @selected(old('lot') == $lot->lot_id)>
                    {{ $lot->lot_id }} | {{ $lot->qty_remaining }} pcs
                </option>
                @endforeach
            </select>
            @error('lot')
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

@section('footer')
    @include('alerts')
@endsection