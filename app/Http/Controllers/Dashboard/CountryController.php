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
    public function index(Request $request)
    {
        if($request->ajax())
        {
            ## Read value
            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page

            $columnIndex_arr = $request->get('order');
            $columnName_arr = $request->get('columns');
            $order_arr = $request->get('order');
            $search_arr = $request->get('search');

            $columnIndex = $columnIndex_arr[0]['column']; // Column index
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir']; // asc or desc
            $searchValue = $search_arr['value']; // Search value

            // Total records
            $totalRecords = Country::count();
            $totalRecordswithFilter = Country::where(function($q) use ($searchValue){
                                                    $q->where('name', 'like', '%' .$searchValue . '%')
                                                        ->orWhere('name_code', 'like', '%' .$searchValue . '%')
                                                        ->orWhere('phone_code', 'like', '%' .$searchValue . '%');
                                                })->count();

            // Fetch records
            $records = Country::orderBy($columnName,$columnSortOrder)
                        ->where(function($q) use ($searchValue){
                            $q->where('name', 'like', '%' .$searchValue . '%')
                                ->orWhere('name_code', 'like', '%' .$searchValue . '%')
                                ->orWhere('phone_code', 'like', '%' .$searchValue . '%');
                        })
                        ->skip($start)
                        ->take($rowperpage)
                        ->get();

            $data_arr = array();

            foreach($records as $index => $record){
                $name = $record->name;
                $name_code = $record->name_code;
                $phone_code = $record->phone_code;
                $status = $record->status_label;
                $id = $record->id;

                $data_arr[] = array(
                  "index" => $index+1,
                  "name" => $name,
                  "name_code" => $name_code,
                  "phone_code" => $phone_code,
                  "status" => $status,
                  "action" => $id,
                );
             }
             $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr
             );

             echo json_encode($response);
             exit;

        }
        else
        {
            $countries = Country::orderBy('created_at', 'DESC')->paginate(10);
            $totalResults = Country::count();
            return view(config('dashboard.resource_folder').$this->controllerResource.'index', compact('countries', 'totalResults'));
        }
    }

    // public function toJsonData()
    // {
    //     return Country::orderBy('created_at', 'DESC')->get()->toJson();
    // }

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
