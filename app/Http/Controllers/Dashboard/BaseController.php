<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Auth;

class BaseController extends Controller
{
    // === Return success json response ===
    protected function successResponse($data, $status_code = 200, $headers = [])
    {
        return response()->json($data, $status_code, $headers);
    }
    // === End function ===

    // === Return error json response ===
    protected function invalidResponse($message, $status_code = 400)
    {
        return response()->json(['errors' => $message], $status_code);
    }
    // === End function ===

    protected function authCheck($guard = 'admin')
    {
        return Auth::guard('admin')->check();
    }
}
