<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.user.user-view', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'nim' => ['required', 'unique:users,nim_mhs', 'max:10'],
        ]);

        $nim = $request->input('nim');
        $username = $nim . '@stikom22j.com';
        $password = 'password123';
        $roleId = $request->input('role_id');

        $user = new User;
        $user->nim_mhs = $nim;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->role_id = $roleId;
        $user->save();

        // Insert to the table according to the role id
        if ($user->exists) {
            if ($user->role_id == 1) {
                $mahasiswa = new Mahasiswa();
                // $mahasiswa->nama = 'Belum diisi';
                // $mahasiswa->foto = 'Foto anda';
                // $mahasiswa->prodi_id = 3;
                $mahasiswa->user_id = $user->id;
                $mahasiswa->save();
            } elseif ($user->role_id == 2) {
                $dosen = new Dosen();
                // $dosen->nama = 'Belum diisi';
                // $dosen->foto = 'Foto anda';
                $dosen->user_id = $user->id;
                $dosen->save();
            } elseif ($user->role_id == 3) {
                $dosen = new Dosen();
                // $dosen->nama = 'Belum diisi';
                // $dosen->foto = 'Foto anda';
                $dosen->user_id = $user->id;
                $dosen->save();
            } elseif ($user->role_id == 4) {
                $admin = new Admin();
                // $admin->nama = 'Belum diisi';
                // $admin->foto = 'Foto anda';
                $admin->user_id = $user->id;
                $admin->save();
            }
        }
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

    public function indexMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.user.create-mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function indexDosen()
    {
        $dosen = Dosen::all();
        return view('admin.user.create-dosen', ['dosens' => $dosen]);
    }

    public function indexAdmin()
    {
        $admin = Admin::all();
        return view('admin.user.create-admin', ['admins' => $admin]);
    }
}
