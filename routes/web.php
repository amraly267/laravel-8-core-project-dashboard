<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Dashboard\AuthController;
// use App\Http\Controllers\Dashboard\AdminController;
// use App\Http\Controllers\Dashboard\CountryController;
// use App\Http\Controllers\Dashboard\RoleController;
// use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\AreaController;


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

// use App\Models\PermissionGroup;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    // === Login admin routes ===
    Route::middleware(['admin.auth'])->group(function () {

        Route::resource('pages', PageController::class);
        Route::get('settings', [SettingController::class, 'index'])->name('admin-settings');
        Route::put('settings', [SettingController::class, 'update'])->name('admin-update-settings');
        Route::get('change-language/{lang}', [SettingController::class, 'changeLanguage'])->name('admin-change-language');

        Route::get('download-area-pdf', [AreaController::class, 'downloadPdf'])->name('download-area-pdf');
        Route::get('download-page-pdf', [PageController::class, 'downloadPdf'])->name('download-page-pdf');
    });

});
