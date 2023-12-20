<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Mtr_file;
use App\Models\Mtr_image;
use App\Models\Tgs_file;
use App\Models\Mtr_video;
use App\Models\Pertemuan;
use Illuminate\Contracts\Session\Session;
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
    public function createFile($id)
    {

        $pertemuan = $id;
        return view('frontend.pages.materi.file-form', compact('pertemuan'));
    }

    public function createTugas(Pertemuan $pertemuanId)
    {
        $pertemuan = $pertemuanId;

        return view('frontend.pages.materi.tugas-form', compact('pertemuan'));
    }

    public function storeVideo(Request $request, $id)
    {
        $request->validate([
            'url_video' => 'required',
            'deskripsi' => 'required|min:5',
        ]);

        $data = [
            'url_video' => extractVideo($request->input('url_video')),
            'deskripsi' => $request->input('deskripsi'),
            'pertemuan_id' => $id,
        ];
        Mtr_video::create($data);

        session()->flash('success', 'Video berhasil di tambahkan.');

        return redirect()->back();
    }

    public function storeFile(Request $request, $id)
    {
        $request->validate([
            'nama_file' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|file',
            // 'pertemuan_id' => 'required'
        ]);

        $file = $request->file("file");
        $OGextension = $file->getClientOriginalExtension();
        $extension = Str::lower($OGextension);

        // Define the allowed extensions
        $allowedExtensions = ['jpg', 'png', 'gif', 'webp', 'mp4', 'avi', 'mov', 'mkv', 'mp3', 'wav', 'ogg', 'flac', 'aac', 'pdf', 'ppt', 'docx', 'doc'];
        // Check if the extension is in the allowed list
        if (!in_array($extension, $allowedExtensions)) {
            session()->flash('error', 'Format file tidak valid.');
            return redirect()->back();
        }

        // Define the path based on the extension
        if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
            $path_file = Mtr_image::storeImage($extension);
        } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) {
            $path_file = 'public/videos/' . time() . '.' . $extension;
        } elseif (in_array($extension, ['mp3', 'wav', 'ogg', 'flac', 'aac'])) {
            $path_file = 'public/audios/' . time() . '.' . $extension;
        } else {
            $path_file = 'public/files/' . time() . '.' . $extension;
        }

        $data = [
            'nama_file' => $request->input('nama_file'),
            'deskripsi' => $request->input('deskripsi'),
            'pertemuan_id' => $id,
            'path_file' => $path_file,
            'extensi' => $extension
        ];

        if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
            Mtr_image::create($data);
        } else {
            Mtr_file::create($data);
        }
        if ($file) {
            Storage::put($path_file, $file->get());
        }
        session()->flash('success', 'File ' . $extension . ' berhasil di tambahkan.');

        return redirect()->back();
    }

    public function storeTugas(Request $request, $id)
    {

        $data = new Tugas;
        $tugas = $data->CreateTugas($request, $id);



        $tugasId = $tugas->id;
        $path_file = uploadFile($request, 'Tugas_file');
        //then i can assign it to the tugas_id like below
        $file = [
            'tugas_id' => $tugasId,
            'path_file' => $path_file
        ];

        Tgs_file::create($file);
        return redirect()->back()->with('success', 'Tugas berhasil di tambahkan.');
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

    public function destroyImage($id)
    {
        // Find the record by its ID
        $file = Mtr_image::find($id);
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
