<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/getLogins', [LoginController::class, 'getLogins'])->name('login.getLogins');

Route::get('/security/csrf', [\App\Http\Controllers\SecurityController::class, 'csrf'])->name('security.csrf');
