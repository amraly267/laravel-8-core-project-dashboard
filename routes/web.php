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

