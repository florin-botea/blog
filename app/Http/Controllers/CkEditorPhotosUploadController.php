<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkEditorPhotosUploadController extends Controller
{
    public function uploadPhoto (Request $request)
    {
        $url = Storage::disk('public')->put('articlePhotos', $request->file('upload'));
        return ['url' => '/storage/'.$url];
    }
}
