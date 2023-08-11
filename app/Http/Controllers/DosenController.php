<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
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
    public function show(Dosen $dosen)
    {
        if ($dosen->user_id != auth()->id()) {
            abort(403, 'Tidak boleh mengintip');
        }
        return view('frontend.pages.dosen.profile.view-profile', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        if ($dosen->user_id != auth()->id()) {
            abort(403, 'Tidak boleh mengintip');
        }
        return view('frontend.pages.dosen.profile.update-profile', compact('dosen'));
    }


    public function update(Request $request, Dosen $dosen)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Validate the input data
        $request->validate([
            'nama' => 'required|string',
            'foto' => 'nullable|file',
            // Add more validation rules for other fields if needed
        ]);

        // Find the corresponding Dosen record
        $dosen = Dosen::where('user_id', $user->id)->first();

        if (!$dosen) {
            // Handle the case where Mahasiswa record doesn't exist for the user
            // Redirect or display an error message as needed
        }
        // Membuat input menjadi lowercase lalu menguppercase first letter
        $dosen->nama = ucwords(strtolower($request->input('nama')));

        // // Handle the file upload and update the "foto" field if a new file is uploaded Old version
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $fotoPath = $foto->store('public/fotos');
        //     $dosen->foto = $fotoPath;
        // }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Convert the image to WebP format
            $webpImage = Image::make($foto)->encode('webp', 90); // Adjust quality as needed
            $webpPath = 'public/fotos/' . time() . '.webp';

            // Save the WebP image to storage
            Storage::put($webpPath, $webpImage->stream());

            // Update the "foto" field with the WebP path
            $dosen->foto = $webpPath;
        }

        $dosen->save();

        return redirect()->route('dosen.show', ['dosen' => $dosen->id])->with('success', 'Profile updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
