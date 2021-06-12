<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apps\Http\Controllers\Dashboard\BaseController;
use Modules\Country\Entities\Country;
use Modules\Admin\Entities\Admin;
use Modules\Page\Entities\Page;
use Spatie\Permission\Models\Role;

class HomeController extends BaseController
{
    public function index()
    {
        $totalAdmins = Admin::count();
        $totalRoles = Role::count();
        $totalCountries = Country::count();
        $totalPages = Page::count();
        return view('home::'.$this->controllerResource.'index', compact('totalAdmins', 'totalRoles', 'totalCountries', 'totalPages'));
    }
}
