<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
// for supporing debugging delete this route if project is in production
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'isAdmin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'isSupervisor'])->prefix('/supervisor')->name('supervisor.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Supervisor\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/work-center', [\App\Http\Controllers\Supervisor\WorkCenterController::class, 'index'])->name('work-center');
    Route::get('/work-center/create', [\App\Http\Controllers\Supervisor\WorkCenterController::class, 'create'])->name('work-center.create');
    Route::post('/work-center', [\App\Http\Controllers\Supervisor\WorkCenterController::class, 'store'])->name('work-center.store');


    Route::get('/lot', [\App\Http\Controllers\Supervisor\LotController::class, 'index'])->name('lot');
    Route::get('/lot/create', [\App\Http\Controllers\Supervisor\LotController::class, 'create'])->name('lot.create');
    Route::post('/lot', [\App\Http\Controllers\Supervisor\LotController::class, 'store'])->name('lot.store');

    Route::get('/report', [App\Http\Controllers\Supervisor\ReportController::class, 'index'])->name('report');
});

Route::middleware(['auth', 'isOperator'])->prefix('/operator')->name('operator.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Operator\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/production/create', [\App\Http\Controllers\Operator\ProductionController::class, 'create'])->name('production.create');
    Route::post('/production', [\App\Http\Controllers\Operator\ProductionController::class, 'store'])->name('production.store');
});

Route::get('/api/production-summary', [\App\Http\Controllers\Api\ProductionSummaryController::class, 'index']);

