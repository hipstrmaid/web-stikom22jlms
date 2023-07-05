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
        // $userId = Auth::id();
        // $mahasiswa = Mahasiswa::where('user_id', $userId)->firstOrFail();
        // $nim = $mahasiswa->user->nim;

        // return view('frontend.profile.view-profile', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Controller method
    public function edit($id)
    {
        // $mahasiswa = Mahasiswa::findOrFail($id);

        // return view('frontend.profile.edit-profile', compact('mahasiswa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'prodi_id' => 'required',
        ]);

        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->prodi_id = $request->input('prodi_id');

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

        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|file',
            'prodi_id' => 'required',
            // Add more validation rules for other fields if needed
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Get the user's ID
        $userID = $user->id;

        // Find the corresponding Dosen record based on the authenticated user
        $Mahasiswa = Mahasiswa::where('user_id', $userID)->first();

        if ($Mahasiswa) {
            // Update the existing Dosen data
            $Mahasiswa->nama = $request->input('nama');

            // Handle the file upload and update the "foto" field
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
                $Mahasiswa->foto = $fotoPath;
            }

            // Update other fields as needed

            $Mahasiswa->save();

            return redirect()->route('mahasiswa.viewProfile', ['id' => $Mahasiswa->id])->with('success', 'Dosen data updated successfully.');
        } else {
            // Create a new Dosen record
            $newMhs = new Mahasiswa();
            $newMhs->nama = $request->input('nama');

            // Handle the file upload and set the "foto" field
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
                $newMhs->foto = $fotoPath;
            }

            $newMhs->user_id = $userID;
            // Set other fields as needed

            $newMhs->save();

            return redirect()->route('mahasiswa.viewProfile')->with('success', 'Mahasiswa data updated successfully.');
        }
    }

    public function viewProfile(string $id)
    {
        $userId = Auth::id();
        $mahasiswa = Mahasiswa::find($userId);
        return view('frontend.pages.mahasiswa.profile.view-profile', compact('mahasiswa'));
    }
}
