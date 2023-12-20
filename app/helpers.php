<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

function extractVideo($url)
{
    $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|ytscreeningroom\?v=|youtube\.com\/v\/|youtube\.com\/embed\/|youtu\.be\/|youtube\.com\/ytscreeningroom\?.+?vi?=|youtube\.com\/user\/.+?#\w\/\w\/\w\/\w\/)|youtu\.be\/)([^?&\n#]+)/';
    preg_match($pattern, $url, $matches);

    if (isset($matches[1])) {
        return $matches[1];
    }

    return null;
}

function checkPermission($contentId, $userId)
{
    if ($contentId !== $userId) {
        abort(403, 'Tidak boleh mengintip');
    }
}


function uploadFile($request, $file_path)
{
    $file = $request->file($file_path);
    $OGextension = $file->getClientOriginalExtension();
    $extension = Str::lower($OGextension);
    $path_file = 'public/files/' . time() . '.' . $extension;
    if ($file) {
        Storage::put($path_file, $file->get());
    }

    return $path_file;
}
