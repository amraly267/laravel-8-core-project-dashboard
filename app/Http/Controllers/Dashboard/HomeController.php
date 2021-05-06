<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    private $controllerResource = 'home.';

    public function index()
    {
        return view(config('dashboard.resource_folder').$this->controllerResource.'index');
    }
}
