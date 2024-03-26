<?php

use App\Http\Controllers\Web\Admin\HomeController;
use App\Http\Controllers\Web\Admin\MovieController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('/admin')->as('admin.')->group(function () {
    // Home page route
    Route::get('/', HomeController::class)->name('index');

    // Movie Routes
    Route::resource('movies', MovieController::class);
});
