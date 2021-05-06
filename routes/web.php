<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SettingController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    // === Not login admin routes ===
    Route::middleware(['admin.guest'])->group(function () {
        Route::get('login', [AuthController::class, 'loginForm'])->name('admin-login');
        Route::get('forget-password', [AuthController::class, 'forgetPasswordForm'])->name('admin-forget-password');
        Route::get('reset-password', [AuthController::class, 'resetPasswordForm'])->name('admin-reset-password');

        Route::middleware('admin.ajax')->group(function () {
            Route::post('submit-login',[AuthController::class, 'submitLogin'])->name('admin-submit-login');
            Route::post('submit-forget-password', [AuthController::class, 'submitForgetPassword'])->name('admin-submit-forget-password');
            Route::post('submit-reset-password', [AuthController::class, 'submitResetPassword'])->name('admin-submit-reset-password');
        });
    });

    // === Login admin routes ===
    Route::middleware(['admin.auth'])->group(function () {

        Route::get('home', [HomeController::class, 'index'])->name('admin-home');
        Route::post('logout', [AuthController::class, 'logout'])->name('admin-logout');
        Route::resource('admins', AdminController::class);
        Route::resource('roles', RoleController::class);
        Route::get('change-language/{lang}', [SettingController::class, 'changeLanguage'])->name('admin-change-language');

    });

});
