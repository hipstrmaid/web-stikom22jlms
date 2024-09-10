<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Topic;
use App\Models\Enroll;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->role_id == 1) {
            $id_mahasiswa = Auth::user()->mahasiswa->id;
            // Retrieve all matkul_ids associated with the logged-in mahasiswa
            $matkulIds = Enroll::where('mahasiswa_id', $id_mahasiswa)->pluck('matkul_id')->unique();

            // Retrieve all forums based on the matkul_ids associated with the mahasiswa
            $forums = Forum::whereIn('matkul_id', $matkulIds)->get()->load('topic');
            $matkuls = Matkul::whereIn('id', $matkulIds)->get();
            return view('frontend.pages.forum', compact('forums', 'matkuls'));
        } elseif (Auth::user()->role_id == 2) {
            $id_dosen = Auth::user()->dosen->id;
            $forums = Forum::whereHas('matkul', function ($query) use ($id_dosen) {
                $query->where('dosen_id', $id_dosen);
            })->get()->load('topic');

            $id_dosen = Auth::user()->dosen->id;
            $matkuls = Matkul::getMatkulByDosenId($id_dosen);
            return view('frontend.pages.forum', compact('forums', 'matkuls'));
        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $id_dosen = Auth::user()->dosen->id;
        // $matkuls = Matkul::getMatkulByDosenId($id_dosen);
        // return view('frontend.pages.forum._addforum', compact('matkuls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matkul_id' => 'required',
        ]);


        $existingForum = Forum::where('matkul_id', $request->matkul_id)->first();

        if ($existingForum) {
            // Record already exists, handle error
            return back()->with('error', 'Forum sudah ada.');
        } else {
            Forum::create($request->all());
            // ... rest of your code for creating record
            return back()->with('success', 'Forum berhasil dibuat.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $forumId = $id;
        $topics = Topic::where('forum_id', $forumId)->get();
        $forum = Forum::where('id', $forumId)->first();
        return view('frontend.pages.forum-view', compact('forumId', 'topics', 'forum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
