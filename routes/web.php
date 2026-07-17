<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\JadwalProduksiController;
use App\Http\Controllers\PerhitunganBOMController;


Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Bahan Baku
    Route::resource('bahan-baku', BahanBakuController::class);

    // Jadwal Produksi
    Route::resource('jadwal-produksi', JadwalProduksiController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    //perhitunganBOM
    Route::resource('perhitungan-bom', PerhitunganBOMController::class);

});