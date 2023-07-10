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
    // }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeProfile(Request $request)
    {

        $user = Auth::user();

        // Get the user's ID
        $userID = $user->id;
        // Validate the form data
        $form = $request->validate([
            'input_nama' => 'required',
            'input_foto' => 'required|file',
            // Add validation rules for other fields
        ]);

        // Create a new instance of your model
        $dosen = new Dosen;

        // Set the values from the validated form data
        $dosen->nama = $form['input_nama'];
        // Handle the file upload and set the "foto" field
        if ($request->hasFile('input_foto')) {
            $foto = $request->file('input_foto');
            $fotoPath = $foto->store('public/fotos'); // Store the file in storage/app/public/fotos
            $dosen->foto = $fotoPath;
        }
        $dosen->user_id = $userID;
        // Set values for other fields

        // Save the model to the database
        $dosen->save();


        // Optionally, you can flash a success message to the session
        // to display a success message on the redirected page

        // Redirect to a specific route or URL
        return redirect()->route('dosen.viewProfile');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile()
    {
        return view('frontend.pages.dosen.profile.create-profile');
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

            return redirect()->route('dosen.viewProfile', ['id' => $dosen->id])->with('success', 'Dosen data updated successfully.');
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

            return redirect()->route('dosen.viewProfile', ['id' => $dosen->id])->with('success', 'Dosen data updated successfully.');
        }
    }

    public function viewProfile(string $id)
    {
        $userId = Auth::id();
        $dosen = Dosen::find($userId);
        return view('frontend.pages.dosen.profile.view-profile', compact('dosen'));
    }
}
