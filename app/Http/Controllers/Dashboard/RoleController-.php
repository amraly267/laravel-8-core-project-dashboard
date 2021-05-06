<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete,admin', ['only' => ['index','store']]);
        $this->middleware('permission:role-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete,admin', ['only' => ['destroy']]);
    }

}
