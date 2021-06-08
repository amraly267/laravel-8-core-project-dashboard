<?php

use Modules\Admin\Http\Controllers\Dashboard\AuthController;

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

Route::middleware(['admin.guest'])->prefix('admin')->namespace('Dashboard')->group(function() {

    Route::get('login', [AuthController::class, 'loginForm'])->name('admin-login');
    Route::get('forget-password', [AuthController::class, 'forgetPasswordForm'])->name('admin-forget-password');
    Route::get('reset-password', [AuthController::class, 'resetPasswordForm'])->name('admin-reset-password');
    Route::post('submit-login',[AuthController::class, 'submitLogin'])->name('admin-submit-login');
    Route::post('submit-forget-password', [AuthController::class, 'submitForgetPassword'])->name('admin-submit-forget-password');
    Route::post('submit-reset-password', [AuthController::class, 'submitResetPassword'])->name('admin-submit-reset-password');
});
