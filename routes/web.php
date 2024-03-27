<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\HomeController;
use App\Http\Controllers\Web\Admin\MovieController;
use App\Http\Controllers\Web\Admin\ShowtimeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin Routes
// Guest Routes
Route::controller(AuthController::class)->middleware('guest')->prefix('/auth')->as('auth.')->group(function () {

    Route::get('/login', 'login')->name('login.show');
    Route::post('/login', 'store')->name('login.store');
});

// Auth Routes
Route::middleware('auth')->prefix('/admin')->as('admin.')->group(function () {
    // Home page route
    Route::get('/', HomeController::class)->name('index');

    // Movie Routes
    Route::resource('movies', MovieController::class);

    // Showtime Routes
    Route::resource('showtimes', ShowtimeController::class)->except('show');

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

abort(404, 'Not Found');