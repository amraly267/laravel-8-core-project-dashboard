<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Dashboard\AdminRequest;
use Spatie\Permission\Models\Permission;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->controllerResource = 'admins.';
        $this->storageFolder = Admin::storageFolder();
        $this->middleware('permission:admin-list,admin', ['only' => ['index','show']]);
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
        $pageTitle = trans(config('dashboard.trans_file').'add_new');
        $submitFormRoute = route('admins.store');
        $submitFormMethod = 'post';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('roles', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $imageName = null;

        if($request->hasFile('image'))
        {
            $imageName = $this->uploadImage($request->image, $this->storageFolder);
        }

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'image' => $imageName,
        ]);

        $this->assignRole($admin, $request->role);
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
        $roles = Role::all();
        $admin = Admin::find($id);
        $pageTitle = trans(config('dashboard.trans_file').'edit');
        $submitFormRoute = route('admins.update', $id);
        $submitFormMethod = 'put';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('roles', 'admin', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::find($id);

        if($request->image_remove)
        {
            $this->removeImage($admin->image, $this->storageFolder);
            $admin->image = null;
        }

        if($request->hasFile('image'))
        {
            $this->removeImage($admin->image, $this->storageFolder);
            $admin->image = $this->uploadImage($request->image, $this->storageFolder);
        }

        if(strlen(trim($request->password)) > 0)
        {
            $admin->password = bcrypt($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->mobile = $request->mobile;
        $admin->save();
        $this->assignRole($admin, $request->role);
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
        if(auth()->guard('admin')->user()->id == $id)
        {
            return $this->successResponse(['message' => trans(config('dashboard.trans_file').'cannot_delete_your_account')], 400);
        }
        $existingAdmin = Admin::find($id);
        $this->removeImage($existingAdmin->image, $this->storageFolder);
        $existingAdmin->delete();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_delete')]);
    }

    // === Assign or update role to admin ===
    private function assignRole($admin, $roleId)
    {
        $admin->roles()->detach();
        $role = Role::find($roleId);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole($roleId);
    }
    // === End function ===
}
