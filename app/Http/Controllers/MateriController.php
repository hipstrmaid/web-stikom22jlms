<?php

namespace App\Http\Controllers;

use App\Models\Mtr_video;
use Illuminate\Http\Request;

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
}
