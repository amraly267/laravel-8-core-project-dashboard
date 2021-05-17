<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Area;
use App\Http\Requests\Dashboard\AreaRequest;

class AreaController extends BaseController
{
    public function __construct()
    {
        $this->controllerResource = 'areas.';
        $this->middleware('permission:area-list,admin', ['only' => ['index','show']]);
        $this->middleware('permission:area-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:area-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:area-delete,admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('created_at', 'DESC')->paginate(10);
        $totalResults = Area::count();
        return view(config('dashboard.resource_folder').$this->controllerResource.'index', compact('areas', 'totalResults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $pageTitle = trans(config('dashboard.trans_file').'add_new');
        $submitFormRoute = route('areas.store');
        $submitFormMethod = 'post';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('cities', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        Area::create([
            'name' => $request->name,
            'city_id' => $request->city_id,
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
        $area = Area::find($id);
        $cities = City::all();
        $pageTitle = trans(config('dashboard.trans_file').'edit');
        $submitFormRoute = route('areas.update', $id);
        $submitFormMethod = 'put';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('area', 'cities', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $area = Area::find($id);
        $area->name = $request->name;
        $area->city_id = $request->city_id;
        $area->status = $request->has('status') ? '1' : '0';
        $area->save();
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
        $existingArea = area::find($id);
        $existingArea->delete();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_delete')]);
    }
}
