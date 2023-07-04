<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DosenController extends Controller
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
    // public function update(Request $request, string $id)
    // {


    //     // Validate the input data
    //     $request->validate([
    //         'nama' => 'required',
    //         'foto' => 'required|file', // Add file validation rule
    //         // Add more validation rules for other fields if needed
    //     ]);

    //     // Retrieve the authenticated user
    //     $user = Auth::user();

    //     // Get the user's ID
    //     $userID = $user->id;

    //     // Find the corresponding Dosen record based on the authenticated user
    //     $dosen = Dosen::where('user_id', $userID)->first();

    //     if ($dosen) {
    //         // Update the existing Dosen data
    //         $dosen->nama = $request->input('nama');

    //         // Handle the file upload and update the "foto" field
    //         if ($request->hasFile('foto')) {
    //             $foto = $request->file('foto');
    //             $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
    //             $dosen->foto = $fotoPath;
    //         }

    //         // Update other fields as needed

    //         $dosen->save();

    //         return redirect()->route('dashboard.index')->with('success', 'Dosen data updated successfully.');
    //     } else {
    //         // Create a new Dosen record
    //         $newDosen = new Dosen();
    //         $newDosen->nama = $request->input('nama');

    //         // Handle the file upload and set the "foto" field
    //         if ($request->hasFile('foto')) {
    //             $foto = $request->file('foto');
    //             $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
    //             $newDosen->foto = $fotoPath;
    //         }

    //         $newDosen->user_id = $userID;
    //         // Set other fields as needed

    //         $newDosen->save();

    //         return redirect()->route('dashboard.index')->with('success', 'Dosen data updated successfully.');
    //     }
    // }

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
        $dosen = Dosen::find($userId);
        return view('frontend.pages.dosen.profile.create-profile', compact('dosen'));
    }

    public function updateProfile(Request $request, string $id)
    {

        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|file', // Add file validation rule
            // Add more validation rules for other fields if needed
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Get the user's ID
        $userID = $user->id;

        // Find the corresponding Dosen record based on the authenticated user
        $dosen = Dosen::where('user_id', $userID)->first();

        if ($dosen) {
            // Update the existing Dosen data
            $dosen->nama = $request->input('nama');

            // Handle the file upload and update the "foto" field
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
                $dosen->foto = $fotoPath;
            }

            // Update other fields as needed

            $dosen->save();

            return redirect()->route('dosen.viewProfile')->with('success', 'Dosen data updated successfully.');
        } else {
            // Create a new Dosen record
            $newDosen = new Dosen();
            $newDosen->nama = $request->input('nama');

            // Handle the file upload and set the "foto" field
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
                $newDosen->foto = $fotoPath;
            }

            $newDosen->user_id = $userID;
            // Set other fields as needed

            $newDosen->save();

            return redirect()->route('dosen.viewProfile')->with('success', 'Dosen data updated successfully.');
        }
    }

    public function viewProfile(string $id)
    {
        $userId = Auth::id();
        $dosen = Dosen::find($userId);
        return view('frontend.pages.dosen.profile.view-profile', compact('dosen'));
    }
}
