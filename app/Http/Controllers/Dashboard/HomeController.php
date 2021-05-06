<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;

class HomeController extends BaseController
{
    private $controllerResource = 'home.';

    public function index()
    {
        $totalAdmins = Admin::count();
        $totalRoles = Role::count();
        return view(config('dashboard.resource_folder').$this->controllerResource.'index', compact('totalAdmins', 'totalRoles'));
    }
}
