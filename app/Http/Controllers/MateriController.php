<?php

namespace App\Http\Controllers;

use App\Models\Mtr_file;
use App\Models\Mtr_video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{

    public function createVideo($id)
    {

        $pertemuan = $id;

        return view('frontend.pages.materi.video-form', compact('pertemuan'));
    }

    public function storeVideo(Request $request)
    {
        $request->validate([
            'url_video' => 'required',
            'deskripsi' => 'required|min:20',
            'pertemuan_id' => 'required'
        ]);

        $url = $request->input('url_video');
        $deskripsi_video = $request->input('deskripsi');
        $pertemuan_id = $request->input('pertemuan_id');

        $video = new Mtr_video;

        $video->url_video = extractVideo($url);
        $video->deskripsi = $deskripsi_video;
        $video->pertemuan_id = $pertemuan_id;
        $video->save();

        session()->flash('success', 'Video berhasil di tambahkan.');

        return redirect()->back();
    }



    public function createFile($id)
    {

        $pertemuan = $id;

        return view('frontend.pages.materi.file-form', compact('pertemuan'));
    }

    public function storeFile(Request $request)
    {
        $request->validate([
            'nama_file' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|file',
            'pertemuan_id' => 'required'
        ]);

        $file = $request->file("file");
        $OGextension = $file->getClientOriginalExtension();
        $extension = Str::lower($OGextension);

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $path_file = 'public/images/' . time() . '.' . $extension;
        } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) {
            $path_file = 'public/videos/' . time() . '.' . $extension;
        } elseif (in_array($extension, ['mp3', 'wav', 'ogg', 'flac', 'aac'])) {
            $path_file = 'public/audios/' . time() . '.' . $extension;
        } else {
            $path_file = 'public/files/' . time() . '.' . $extension;
        }

        if ($file) {
            Storage::put($path_file, $file->get());
        }


        $data = [
            'nama_file' => $request->input('nama_file'),
            'deskripsi' => $request->input('deskripsi'),
            'pertemuan_id' => $request->input('pertemuan_id'),
            'path_file' => $path_file,
            'extensi' => $extension
        ];

        Mtr_file::create($data);
        session()->flash('success', 'File ' . $extension . ' berhasil di tambahkan.');


        return redirect()->back();
    }

    public function destroyFile($id)
    {
        // Find the record by its ID
        $file = Mtr_file::find($id);
        // Check if the record exists
        if (!$file) {
            return redirect()->back()->with('error', 'File not found.');
        }
        // Delete the actual file from the storage
        Storage::delete($file->path_file);
        // Delete the record from the database
        $file->delete();

        return redirect()->back()->with('success', 'File has been deleted.');
    }

    public function destroyYoutube($id)
    {
        // Find the record by its ID
        $file = Mtr_video::find($id);
        // Check if the record exists
        if (!$file) {
            return redirect()->back()->with('error', 'File not found.');
        }
        // Delete the record from the database
        $file->delete();

        return redirect()->back()->with('success', 'File has been deleted.');
    }
}
