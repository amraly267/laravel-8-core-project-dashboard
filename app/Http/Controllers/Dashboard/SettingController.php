<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Dashboard\SettingRequest;
use App;
use App\Models\Country;
use App\Models\Timezone;

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
        $countries = Country::all();
        $tagifyCountriesValues = $this->retrieveTagifyCountries('id', explode(',', $settings->supported_countries), 'name');
        $tagifyCountriesNames = Country::pluck('name')->all();
        $timezones = Timezone::all();
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('timezones','tagifyCountriesNames', 'tagifyCountriesValues', 'countries','settings', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
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

        $supportedCountries = collect(json_decode($request->supported_countries, true))->map(function($supportedCountry){
            return $supportedCountry['value'];
        });

        $settings->supported_countries = implode(',',Country::whereIn('name->'.config('app.locale'), $supportedCountries)->pluck('id')->all());
        $settings->default_country_id = $request->default_country_id;
        $settings->supported_locales = $request->supported_locales;
        $settings->default_locale = $request->default_locale;
        $settings->timezone_id = $request->timezone_id;
        $settings->save();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_save')]);
    }
    // === End function ===

    // === Retrieve tagify country values ===
    private function retrieveTagifyCountries($currentColumn, $countries, $retireveCol)
    {
        return Country::whereIn($currentColumn, $countries)->pluck($retireveCol);
    }
    // === End function ===
}
