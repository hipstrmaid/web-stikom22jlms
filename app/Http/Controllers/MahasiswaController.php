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
        // // $users = User::with('role')->get();
        // // return view('admin.user.user-view', ['users' => $users]);
        // $mahasiswa = Mahasiswa::all();
        // return view('admin.mahasiswa.create-mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_mahasiswa = Auth::id();
        $mahasiswa = Mahasiswa::find($id_mahasiswa); // Mengambil id dari Auth
        return view('frontend.profile.create-profile', ['edit' => $mahasiswa]);
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
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'foto' => 'required'
        ]);

        $id_mahasiswa = Auth::id();
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);

        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->nusername = $request->input('nim');
        $mahasiswa->password = $request->input('password');
        $mahasiswa->foto = $request->input('foto');

        $mahasiswa->save();

        return redirect()->back()->with('success', 'Mahasiswa updated successfully.');
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
        $id_mahasiswa = Auth::id();
        $mahasiswa = Mahasiswa::find($id_mahasiswa); // Mengambil id dari Auth
        return view('frontend.profile.view-profile', ['mhs' => $mahasiswa]);
    }
}
