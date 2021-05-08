<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Dashboard\SettingRequest;
use App;

class SettingController extends BaseController
{
    public function __construct()
    {
        $this->controllerResource = 'settings.';
        $this->storageFolder = Setting::storageFolder();
        $this->middleware('permission:setting-edit,admin', ['only' => ['index','update']]);
    }

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

    // === Get settings data to form ===
    public function index()
    {
        $settings = Setting::find(1);
        $pageTitle = trans(config('dashboard.trans_file').'settings');
        $submitFormRoute = route('admin-update-settings');
        $submitFormMethod = 'put';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('settings', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }
    // === End function ===

    // === Update settings ===
    public function update(SettingRequest $request)
    {
        $settings = Setting::find(1);
        $settings->fill($request->all());

        if($request->logo_remove)
        {
            $this->removeImage($settings->logo, $this->storageFolder);
            $settings->logo = null;
        }

        if($request->hasFile('logo'))
        {
            $this->removeImage($settings->logo, $this->storageFolder);
            $settings->logo = $this->uploadImage($request->logo, $this->storageFolder);
        }

        $settings->save();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_save')]);
    }
    // === End function ===
}
