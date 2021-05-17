<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Http\Requests\Dashboard\CityRequest;

class CityController extends BaseController
{
    public function __construct()
    {
        $this->controllerResource = 'cities.';
        $this->middleware('permission:city-list,admin', ['only' => ['index','show']]);
        $this->middleware('permission:city-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:city-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:city-delete,admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('created_at', 'DESC')->paginate(10);
        $totalResults = City::count();
        return view(config('dashboard.resource_folder').$this->controllerResource.'index', compact('cities', 'totalResults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $pageTitle = trans(config('dashboard.trans_file').'add_new');
        $submitFormRoute = route('cities.store');
        $submitFormMethod = 'post';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('countries', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        City::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
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
        $city = City::find($id);
        $countries = Country::all();
        $pageTitle = trans(config('dashboard.trans_file').'edit');
        $submitFormRoute = route('cities.update', $id);
        $submitFormMethod = 'put';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('city', 'countries', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->status = $request->has('status') ? '1' : '0';
        $city->save();
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
        $existingCity = City::find($id);
        $existingCity->delete();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_delete')]);
    }
}
