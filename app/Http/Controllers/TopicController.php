<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_dosen = Auth::user()->dosen->id;

        return view('frontend.pages.forum._addtopic');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'forum_id' => 'required',
        ]);


        $user_id = Auth::user()->id;
        $existingForum = Topic::where('judul', $request->judul)->first();

        if ($existingForum) {
            // Record already exists, handle error
            return back()->with('error', 'Topik sudah ada.');
        } else {
            Topic::create([
                'judul' => $request->judul,
                'forum_id' => $request->forum_id,
                'user_id' => $user_id

            ]);
            // ... rest of your code for creating record
            return back()->with('success', 'Topik berhasil dibuat.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
