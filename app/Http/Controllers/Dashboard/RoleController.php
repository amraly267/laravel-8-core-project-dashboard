<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Models\PermissionGroup;
class RoleController extends BaseController
{
    public function __construct()
    {
        $this->controllerResource = 'roles.';
        $this->middleware('permission:role-list,admin', ['only' => ['index','show']]);
        $this->middleware('permission:role-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete,admin', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->paginate(10);
        $totalResults = Role::count();
        return view(config('dashboard.resource_folder').$this->controllerResource.'index', compact('roles', 'totalResults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = PermissionGroup::get();
        $pageTitle = trans(config('dashboard.trans_file').'add_new');
        $submitFormRoute = route('roles.store');
        $submitFormMethod = 'post';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('permissions', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
        $role->syncPermissions($request->permissions);
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
        $permissions = PermissionGroup::all();
        $role = Role::with('permissions')->find($id);

        $relatedPermissions = Permission::whereHas('roles', function($q) use ($role){
            $q->where('name', $role->name);
        })->pluck('id')->toArray();

        $pageTitle = trans(config('dashboard.trans_file').'edit');
        $submitFormRoute = route('roles.update', $id);
        $submitFormMethod = 'put';
        return view(config('dashboard.resource_folder').$this->controllerResource.'form', compact('relatedPermissions', 'permissions', 'role', 'pageTitle', 'submitFormRoute', 'submitFormMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->save();
        $role->syncPermissions($request->permissions);
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
        $role = Role::where('id', $id)->delete();
        return $this->successResponse(['message' => trans(config('dashboard.trans_file').'success_delete')]);
    }
}
