@extends('layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard Admin</h2>
    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text display-6 fw-bold">120</p>
                    <p class="text-muted mb-0">Jumlah user terdaftar</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title">Produksi Hari Ini</h5>
                    <p class="card-text display-6 fw-bold">350</p>
                    <p class="text-muted mb-0">Unit selesai diproduksi</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title">Laporan Masuk</h5>
                    <p class="card-text display-6 fw-bold">24</p>
                    <p class="text-muted mb-0">Laporan belum ditinjau</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection