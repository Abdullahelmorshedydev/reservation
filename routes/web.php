<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\HomeController;
use App\Http\Controllers\Web\Admin\MovieController;
use App\Http\Controllers\Web\Site\AttendeeController;
use App\Http\Controllers\Api\Site\GetMoviesController;
use App\Http\Controllers\Web\Admin\EventdayController;
use App\Http\Controllers\Web\Admin\ShowtimeController;
use App\Http\Controllers\Api\Site\GetShowtimesController;

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

    // Eventday Routes
    Route::resource('eventdays', EventdayController::class);

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Reserve Routes
Route::controller(AttendeeController::class)->as('attendee.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
});

Route::get('movies/{id?}', [GetMoviesController::class, 'getMovies'])->name('movies');
Route::get('showtimes/{id?}', [GetShowtimesController::class, 'getShowtimes'])->name('showtimes');

Route::fallback(function () {
    return redirect()->route('admin.index');
});