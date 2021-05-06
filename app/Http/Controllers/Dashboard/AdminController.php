<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Dashboard\AdminRequest;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Auth;

class AdminController extends BaseController
{
    private $controllerResource = 'admins.';

    public function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete,admin', ['only' => ['index','show']]);
        $this->middleware('permission:admin-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete,admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'DESC')->paginate(10);
        $totalResults = Admin::count();
        return view(config('dashboard.resource_folder').$this->controllerResource.'index', compact('admins', 'totalResults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $admins = Admin::orderBy('created_at', 'DESC')->get();
        $pageTitle = trans(config('dashboard.trans_file').'add_new');
        $submitFormRoute = route('admins.store');
        $submitFormMethod = 'post';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('roles', 'admins', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $fileName = null;
        if($request->hasFile('image'))
        {
            $fileName = uniqid(). '.png' ;
            Storage::disk('admins')->put($fileName, file_get_contents($request->image->getRealPath()));
        }

        $savedAdmin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'image' => $fileName,
        ]);

        $role = Role::find($request->role);

        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $savedAdmin->assignRole([$request->role]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
