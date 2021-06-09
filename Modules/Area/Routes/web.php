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



Route::middleware(['admin.auth'])->prefix('admin')->namespace('Dashboard')->group(function() {
    Route::resource('areas', AreaController::class);
    Route::get('city-areas/{cityId}', 'AreaController@cityAreas')->name('admin-city-areas');
});
