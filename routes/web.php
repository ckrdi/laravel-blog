<?php

use App\Http\Controllers\CategoryDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostDashboardController;
use App\Http\Controllers\TagDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/about', 'about')->name('about');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/post', PostDashboardController::class)->except([ 'index', 'show' ]);
    Route::resource('/category', CategoryDashboardController::class)->except([ 'index', 'show' ]);
    Route::resource('/tag', TagDashboardController::class)->except([ 'index', 'show' ]);
});

require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');
