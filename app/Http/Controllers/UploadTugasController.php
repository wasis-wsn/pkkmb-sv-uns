<?php

namespace App\Http\Controllers;

use IlluminateVittp\Request;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use File;

class UploadTugasController extends Controller
{
public function upload( )
    {
        $path = public_path().'/'. 'file.png';
        $filename = 'file.png';

        Storage::disk('google')->put($filename, File::get($path));

        return response()->json(['success' => true]);
    }
}
