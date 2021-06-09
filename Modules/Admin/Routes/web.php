<?php

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

    Route::get('login', 'AuthController@loginForm')->name('admin-login');
    Route::get('forget-password', 'AuthController@forgetPasswordForm')->name('admin-forget-password');
    Route::get('reset-password', 'AuthController@resetPasswordForm')->name('admin-reset-password');
    Route::post('submit-login','AuthController@submitLogin')->name('admin-submit-login');
    Route::post('submit-forget-password', 'AuthController@submitForgetPassword')->name('admin-submit-forget-password');
    Route::post('submit-reset-password', 'AuthController@submitResetPassword')->name('admin-submit-reset-password');
});

Route::middleware(['admin.auth'])->prefix('admin')->namespace('Dashboard')->group(function() {

    Route::resource('admins', AdminController::class);
    Route::post('logout', 'AuthController@logout')->name('admin-logout');
    Route::get('profile', 'AuthController@profile')->name('admin-profile');
    Route::put('update-profile', 'AuthController@updateProfile')->name('admin-update-profile');
    Route::get('role-admins/{role?}', 'AdminController@index')->name('role-admins');
    Route::get('download-admin-pdf', 'AdminController@downloadPdf')->name('download-admin-pdf');

});
