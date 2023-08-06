<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();
        if ($user->role_id === 1) {
            return redirect()->route('edit-mahasiswa-profile', ['id' => $user->mahasiswa->id]);
        } elseif ($user->role_id === 2) {
            return redirect()->route('dosen.edit', $user->dosen->id);
        } elseif ($user->role === 4) {
            return redirect()->route('edit-admin-profile', ['id' => $user->admin->id]);
        }

        // Handle other roles or redirect to a default route if needed
    }
}
