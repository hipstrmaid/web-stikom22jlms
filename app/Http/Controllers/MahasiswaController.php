<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::with('role')->get();
        // return view('admin.user.user-view', ['users' => $users]);
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.create-mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.profile.create-profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'foto' => 'required',
            'prodi_id' => 'required',
        ]);

        $data['user_id'] = Auth::id(); // Assign the authenticated user's ID to the user_id field

        Mahasiswa::create($data);

        Session::flash('success');

        return redirect()->back();
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

    public function updateData()
    {
    }

    public function viewProfile()
    {
        $userId = Auth::id(); // Get the ID of the currently authenticated user
        $mahasiswa = Mahasiswa::where('user_id', $userId)->firstOrFail();
        $nim = $mahasiswa->user->nim;
        return view('frontend.profile.view-profile', ['mahasiswa' => $mahasiswa, 'nim' => $nim]);
    }
}
