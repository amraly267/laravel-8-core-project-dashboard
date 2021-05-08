<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\Dashboard\CountryRequest;

class CountryController extends BaseController
{
    public function __construct()
    {
        $this->controllerResource = 'countries.';
        $this->storageFolder = Country::storageFolder();
        $this->middleware('permission:country-list,admin', ['only' => ['index','show']]);
        $this->middleware('permission:country-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:country-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:country-delete,admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('created_at', 'DESC')->paginate(10);
        $totalResults = Country::count();
        return view(config('dashboard.resource_folder').$this->controllerResource.'index', compact('countries', 'totalResults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = trans(config('dashboard.trans_file').'add_new');
        $submitFormRoute = route('countries.store');
        $submitFormMethod = 'post';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $flagName = null;

        if($request->hasFile('flag'))
        {
            $flagName = $this->uploadImage($request->flag, $this->storageFolder);
        }

        Country::create([
            'name' => $request->name,
            'name_code' => $request->name_code,
            'phone_code' => $request->phone_code,
            'flag' => $flagName,
            'status' => $request->has('status') ? '1' : '0',
        ]);

        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_save')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        $pageTitle = trans(config('dashboard.trans_file').'edit');
        $submitFormRoute = route('countries.update', $id);
        $submitFormMethod = 'put';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('country', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $country = Country::find($id);

        if($request->flag_remove)
        {
            $this->removeImage($country->flag, $this->storageFolder);
            $country->flag = null;
        }

        if($request->hasFile('flag'))
        {
            $this->removeImage($country->flag, $this->storageFolder);
            $country->flag = $this->uploadImage($request->flag, $this->storageFolder);
        }

        $country->name = $request->name;
        $country->name_code = $request->name_code;
        $country->phone_code = $request->phone_code;
        $country->status = $request->has('status') ? '1' : '0';
        $country->save();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_save')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingCountry = Country::find($id);
        $this->removeImage($existingCountry->flag, $this->storageFolder);
        $existingCountry->delete();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_delete')]);
    }
}
