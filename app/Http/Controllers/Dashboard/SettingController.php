<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class SettingController extends Controller
{
    // === Change dashbaord language ===
    public function changeLanguage(Request $request)
    {
        if(in_array($request->lang, ['en', 'ar']))
        {
            App::setLocale($request->lang);
            session()->put('dashboard-locale', $request->lang);
        }
        else
        {
            App::setLocale(config('app.fallback_locale'));
            session()->put('dashboard-locale', config('app.fallback_locale'));
        }
        return redirect()->back();
    }
    // === End function ===
}
