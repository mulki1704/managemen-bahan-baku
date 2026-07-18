<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\JadwalProduksiController;
use App\Http\Controllers\PerhitunganBOMController;
use App\Http\Controllers\KelolaUserController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('bahan-baku', BahanBakuController::class);

    Route::resource('jadwal-produksi', JadwalProduksiController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('perhitungan-bom', PerhitunganBOMController::class);

    Route::middleware(\App\Http\Middleware\SuperAdmin::class)->group(function () {
        Route::resource('kelola-user', KelolaUserController::class)
            ->parameters(['kelola-user' => 'user']);
    });

});