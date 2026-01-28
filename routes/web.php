<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProfileController; // <--- WAJIB ADA

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Rute Standar User Profile (Agar navigasi pojok kanan atas jalan)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. Rute Admin PPID
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('berita', BeritaController::class);
        Route::resource('dokumen', DokumenController::class);
        Route::resource('kategori', App\Http\Controllers\KategoriController::class);
        
        // Profil Organisasi PPID (Beda dengan Profil User)
        // Saya ganti namanya jadi 'profil-ppid' agar tidak bentrok dengan 'profile' di atas
        Route::get('/profil-ppid', [App\Http\Controllers\ProfilPpidController::class, 'index'])->name('profil-ppid.index'); 
        
        // Menu Tambahan
        Route::get('/prosedur-sop', function() { return view('admin.prosedur.index'); })->name('prosedur.index');
        Route::get('/lpse-pengadaan', function() { return view('admin.lpse.index'); })->name('lpse.index');
        Route::get('/faq-admin', function() { return view('admin.faq.index'); })->name('faq.index');
    });
});

require __DIR__.'/auth.php';