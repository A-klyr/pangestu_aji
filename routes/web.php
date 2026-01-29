<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KasirController; // ⚠️ TAMBAHKAN INI - YANG KURANG!
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Route admin dipisahkan agar tidak bentrok dengan user biasa.
| Semua rute dilindungi sesuai dengan peran (Admin/Kasir).
|--------------------------------------------------------------------------
*/

// Halaman awal (langsung ke login)
Route::get('/', function () {
    return redirect()->route('login');
});

// Debug route - cek role user
Route::get('/check-role', function () {
    return auth()->check() ? auth()->user()->role : 'Not logged in';
})->middleware('auth');


// ===============================
// ROUTE KHUSUS USER BIASA
// ===============================

// Route kasir untuk user biasa
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [KasirController::class, 'dashboard'])->name('dashboard');
    Route::get('/kasir/pos', [KasirController::class, 'pos'])->name('kasir.pos');
    Route::get('/kasir/history', [KasirController::class, 'history'])->name('kasir.history');
    Route::post('/kasir/checkout', [KasirController::class, 'checkout'])->name('kasir.checkout');
});


// ===============================
// ROUTE KHUSUS ADMIN
// ===============================
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD Produk khusus admin
    Route::resource('products', ProductController::class);
    Route::resource('customers', \App\Http\Controllers\CustomerController::class);
    Route::resource('sales', \App\Http\Controllers\SaleController::class)->only(['index', 'show']);

    // Analytics
    Route::get('analytics', [\App\Http\Controllers\AnalyticsController::class, 'index'])->name('analytics.index');

    // Settings
    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
});


// ===============================
// ROUTE PROFILE UNTUK USER LOGIN
// ===============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route auth bawaan Breeze
require __DIR__ . '/auth.php';