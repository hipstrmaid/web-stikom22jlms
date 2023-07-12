<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $id_mahasiswa = Auth::id();
        // $mahasiswa = Mahasiswa::find($id_mahasiswa); // Mengambil id dari Auth
        // return view('frontend.profile.create-profile', ['edit' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('frontend.pages.mahasiswa.profile.view-profile', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Controller method
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('frontend.pages.mahasiswa.profile.create-profile', compact('mahasiswa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|file',
            'prodi_id' => 'required',
            // Add more validation rules for other fields if needed
        ]);

        // Find the corresponding Mahasiswa record
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            // Handle the case where Mahasiswa record doesn't exist for the user
            // Redirect or display an error message as needed
        }

        // Update the Mahasiswa record
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->prodi_id = $request->input('prodi_id');

        // Handle the file upload and update the "foto" field if a new file is uploaded
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->store('public/fotos');
            $mahasiswa->foto = $fotoPath;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.show', ['mahasiswa' => $mahasiswa->id])->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile(string $id)
    {
        $userId = Auth::id();
        $mahasiswa = Mahasiswa::find($userId);
        return view('frontend.pages.mahasiswa.profile.create-profile', compact('mahasiswa'));
    }

    public function updateProfile(Request $request, string $id)
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        // Get the user's ID
        $id_user = $user->id;
        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|file',
            'prodi_id' => 'required',
            // Add more validation rules for other fields if needed
        ]);

        $nama = $request->input('nama');
        $foto = $request->file('foto');
        $prodi = $request->input('prodi_id');
        // Create a new Dosen record
        $newMhs = new Mahasiswa();
        $newMhs->nama = $nama;
        // Handle the file upload and set the "foto" field
        if ($request->hasFile('foto')) {
            $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
            $newMhs->foto = $fotoPath;
        }
        $newMhs->prodi_id = $prodi;
        $newMhs->user_id = $id_user;
        $newMhs->save();

        return redirect()->route('mahasiswa.viewProfile')->with('success', 'Mahasiswa data updated successfully.');
    }

    public function viewProfile(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('frontend.pages.mahasiswa.profile.view-profile', compact('mahasiswa'));
    }
}
