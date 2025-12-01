<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\KategoriController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DestinasiController as AdminDestinasiController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;


/*
|--------------------------------------------------------------------------
| DEFAULT : HALAMAN LOGIN (TANPA NAME)
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showLogin']); // ← TANPA name()

/*
|--------------------------------------------------------------------------
| LOGIN & REGISTER (HARUS ADA GET /login)
|--------------------------------------------------------------------------
*/

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// proses login
Route::post('/login', [AuthController::class, 'login']);




/*
|--------------------------------------------------------------------------
| LOGOUT (POST ONLY)
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| USER ROUTES (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

// Destinasi bisa dibuka tanpa login
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');
Route::get('/destinasi/{id}', [DestinasiController::class, 'show'])->name('destinasi.show');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    // Halaman checkout
    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
        ->name('checkout');

    // PROSES FORM CHECKOUT (FIX MISSED ROUTE)
Route::post('/checkout/{id}', [CheckoutController::class, 'store'])
    ->name('checkout.store');


    // User kirim pesan dari footer
Route::post('/contact/send', [ContactController::class, 'store'])
    ->name('contact.store');

});





/*
|--------------------------------------------------------------------------
| KATEGORI ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/kategori', [KategoriController::class, 'index'])
    ->name('kategori.index');

Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])
    ->name('kategori.show');

Route::get('/kategori/{kategori}/{id}', [KategoriController::class, 'detail'])
    ->name('kategori.detail');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // CRUD Destinasi
    Route::resource('destinasi', AdminDestinasiController::class, ['as' => 'admin']);

    // User Control
    Route::resource('users', AdminUserController::class, ['as' => 'admin'])
        ->only(['index', 'destroy']);

    Route::post('users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin'])
        ->name('admin.users.toggleAdmin');

    // Contact
    Route::resource('contacts', AdminContactController::class, ['as' => 'admin'])
        ->only(['index', 'show', 'destroy']);

    // Pesanan (Index, Detail)
    Route::resource('pesanan', AdminPesananController::class, ['as' => 'admin'])
    ->only(['index', 'show', 'destroy']);


    // Checkout status
    Route::post('checkouts/{checkout}/status', [AdminCheckoutController::class, 'updateStatus'])
        ->name('admin.checkouts.status');
});

