<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
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
        // $data = $request->validate([
        //     'nama' => 'required',
        //     'foto' => 'required',
        //     'prodi_id' => 'required',
        // ]);

        // $data['user_id'] = Auth::id(); // Assign the authenticated user's ID to the user_id field

        // Mahasiswa::create($data);

        // Session::flash('success');

        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->user_id != auth()->id()) {
            abort(403);
        }
        return view('frontend.pages.mahasiswa.profile.view-profile', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Controller method
    public function edit(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->user_id != auth()->id()) {
            abort(403);
        }
        return view('frontend.pages.mahasiswa.profile.update-profile', compact('mahasiswa'));
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
            'nama' => ['required', 'string'],
            'foto' => 'nullable|file',
            // Add more validation rules for other fields if needed
        ]);

        // Find the corresponding Mahasiswa record
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        if (!$mahasiswa) {
            // Handle the case where Mahasiswa record doesn't exist for the user
            // Redirect or display an error message as needed
        }

        // Membuat input menjadi lowercase lalu menguppercase first letter
        $mahasiswa->nama = ucwords(strtolower($request->input('nama')));

        // // Handle the file upload and update the "foto" field if a new file is uploaded
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $fotoPath = $foto->store('public/fotos');
        //     $mahasiswa->foto = $fotoPath;
        // }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Convert the image to WebP format
            $webpImage = Image::make($foto)->encode('webp', 90); // Adjust quality as needed
            $webpPath = 'public/fotos/' . time() . '.webp';

            // Save the WebP image to storage
            Storage::put($webpPath, $webpImage->stream());

            // Update the "foto" field with the WebP path
            $mahasiswa->foto = $webpPath;
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
}
