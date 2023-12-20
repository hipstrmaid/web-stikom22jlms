<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($directory, $filename)
    {
        // Define an array of allowed directories to prevent access to unauthorized locations
        $allowedDirectories = ['files', 'fotos', 'audios'];

        // Check if the requested directory is allowed
        if (!in_array($directory, $allowedDirectories)) {
            abort(403, 'Unauthorized directory.');
        }

        // Check if the file exists
        if (!Storage::exists("public/{$directory}/{$filename}")) {
            abort(404, 'File not found.');
        }

        // Generate the file URL
        $fileUrl = asset("storage/{$directory}/{$filename}");

        // Redirect the user to the file URL, which will trigger the download
        return redirect($fileUrl);
    }
}
