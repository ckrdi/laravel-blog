<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

Route::resource('/dashboard', DashboardController::class)->middleware(['auth']);

require __DIR__.'/auth.php';

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');
