<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinasiController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DestinasiController as AdminDestinasiController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckoutController;


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
    Route::get('/my-checkout/{checkout}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});




/*
|--------------------------------------------------------------------------
| KATEGORI ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/kategori/gunung', fn() => view('kategori.gunung'))->name('kategori.gunung');
Route::get('/kategori/budaya', fn() => view('kategori.budaya'))->name('kategori.budaya');
Route::get('/kategori/pantai', fn() => view('kategori.pantai'))->name('kategori.pantai');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('destinasi', AdminDestinasiController::class, ['as' => 'admin']);
    Route::resource('users', AdminUserController::class, ['as' => 'admin'])
        ->only(['index', 'destroy']);

    Route::post('users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin'])
        ->name('admin.users.toggleAdmin');

    Route::resource('contacts', AdminContactController::class, ['as' => 'admin'])
        ->only(['index', 'show', 'destroy']);

    Route::resource('checkouts', AdminCheckoutController::class, ['as' => 'admin'])
        ->only(['index', 'show']);

    Route::post('checkouts/{checkout}/status', [AdminCheckoutController::class, 'updateStatus'])
        ->name('admin.checkouts.status');
});

