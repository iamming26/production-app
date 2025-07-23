@extends('layouts.app')

@section('content')
<div class="content-header">Dashboard</div>
<p>Selamat datang di sistem produksi manufaktur.</p>
<div class="row g-3">
  <!-- Card Merah -->
  <div class="col-md-4">
    <div class="card main-card bg-dashboard-danger h-100">
      <div class="card-body">
        <h5 class="card-title">Pengguna Nonaktif</h5>
        <p class="card-text display-6 fw-bold">5</p>
        <p class="text-muted mb-0">Perlu tindakan</p>
      </div>
    </div>
  </div>

  <!-- Card Kuning -->
  <div class="col-md-4">
    <div class="card main-card bg-dashboard-warning h-100">
      <div class="card-body">
        <h5 class="card-title">Produksi Tertunda</h5>
        <p class="card-text display-6 fw-bold">12</p>
        <p class="text-muted mb-0">Menunggu bahan</p>
      </div>
    </div>
  </div>

  <!-- Card Hijau -->
  <div class="col-md-4">
    <div class="card main-card bg-dashboard-success h-100">
      <div class="card-body">
        <h5 class="card-title">Produksi Selesai</h5>
        <p class="card-text display-6 fw-bold">80</p>
        <p class="text-muted mb-0">Hari ini selesai</p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('styles')
<style>
    .bg-dashboard-danger {
    background-color: var(--bg-danger);
    }
    .bg-dashboard-warning {
    background-color: var(--bg-warning);
    }
    .bg-dashboard-success {
    background-color: var(--bg-success);
    }
</style>
@endsection