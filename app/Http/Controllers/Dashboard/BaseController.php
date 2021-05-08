<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;

class BaseController extends Controller
{
    protected $controllerResource;
    protected $storageFolder;

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

    // === Upload image from storage folder ===
    public function uploadImage($image, $storageFolder)
    {
        if(!Storage::exists($storageFolder))
        {
            Storage::makeDirectory($storageFolder);
        }

        $imageName = uniqid(). '.png' ;
        Storage::disk($storageFolder)->put($imageName, file_get_contents($image->getRealPath()));
        return $imageName;
    }
    // === End function ===

    // === Remove image from storage folder ===
    public function removeImage($imageName, $storageFolder)
    {
        Storage::disk($storageFolder)->delete($imageName);
    }
    // === End function ===
}
