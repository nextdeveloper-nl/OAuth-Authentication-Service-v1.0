<?php


use App\Http\Controllers\OAuth\AuthorizationController;
use App\Http\Controllers\ThirdParty\GithubController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ThirdParty\GoogleController;
//use Laravel\Passport\Http\Controllers\AuthorizationController;

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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);

Route::prefix('oauth')->group(function() {
    Route::get('authorize', [\App\Http\Controllers\OAuth\AuthCodeController::class, 'index']);
});

Route::get('/redirect', [\App\Http\Controllers\RedirectController::class, 'redirect']);

Route::get('/login', [LoginController::class, 'index']);//->name('login');
Route::post('/login', [LoginController::class, 'loginUser'])->name('login.loginUser');

Route::get('/login/renew/email-otp', [LoginController::class, 'newEmailOtp'])->name('login.newEmailOtp');

Route::get('/getLogins', [LoginController::class, 'getLogins'])->name('login.getLogins');

Route::get('/locale', [\App\Http\Controllers\LocaleController::class, 'index'])->name('locale.index');
Route::put('/locale', [\App\Http\Controllers\LocaleController::class, 'setLocale'])->name('locale.setLocale');

Route::get('/security/csrf', [\App\Http\Controllers\SecurityController::class, 'csrf'])->name('security.csrf');

Route::prefix('/third-party')->group(function() {
    Route::prefix('google')->group(function() {
        Route::get('signin', [GoogleController::class, 'signin']);
        Route::get('login', [GoogleController::class, 'login']);
    });

    Route::prefix('github')->group(function() {
        Route::get('signin', [GithubController::class, 'signin']);
        Route::get('login', [GithubController::class, 'login']);
    });
});