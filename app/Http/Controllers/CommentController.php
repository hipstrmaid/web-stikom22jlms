<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $userId = Auth::user()->id;
        Comment::create([
            'topic_id' => $request->topic_id,
            'user_id' => $userId,
            'isi_komentar' => $request->isi_komentar

        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topics = Topic::where('id', $id)->first();
        $carbonDate = Carbon::parse($topics->created_at);
        $createdAt = $carbonDate->diffForHumans();
        $comments = Comment::where('topic_id', $id)->get();
        return view('frontend.pages.forum-diskusi', compact('topics', 'comments', 'createdAt'));
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
