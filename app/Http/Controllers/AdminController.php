<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
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

    public function show(Admin $admin)
    {
        if ($admin->user_id != auth()->id()) {
            abort(403, 'Tidak boleh mengintip');
        }
        return view('admin.profile.view-profile', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        if ($admin->user_id != auth()->id()) {
            abort(403, 'Tidak boleh mengintip');
        }

        return view('admin.profile.update-profile', compact('admin'));
    }


    public function update(Request $request, Admin $admin)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'foto' => 'nullable|file',
            // Add more validation rules for other fields if needed
        ]);

        // Find the corresponding Admin record
        $admin = Admin::where('user_id', $user->id)->first();

        if (!$admin) {
            // Handle the case where Mahasiswa record doesn't exist for the user
            // Redirect or display an error message as needed
        }

        // Membuat input menjadi lowercase lalu menguppercase first letter
        $admin->nama = ucwords(strtolower($request->input('nama')));

        // // Handle the file upload and update the "foto" field if a new file is uploaded
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $fotoPath = $foto->store('public/fotos');
        //     $admin->foto = $fotoPath;
        // }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Convert the image to WebP format
            $webpImage = Image::make($foto)->encode('webp', 90); // Adjust quality as needed
            $webpPath = 'public/fotos/' . time() . '.webp';

            // Save the WebP image to storage
            Storage::put($webpPath, $webpImage->stream());

            // Update the "foto" field with the WebP path
            $admin->foto = $webpPath;
        }

        $admin->save();

        return redirect()->route('admin.show', ['admin' => $admin->id])->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
