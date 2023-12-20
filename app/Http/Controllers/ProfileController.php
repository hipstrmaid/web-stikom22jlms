<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function editProfile()
    {
        $user = Auth::user();

        if ($user->role_id === 1) {
            return redirect()->route('mahasiswa.edit',  $user->mahasiswa->id);
        } elseif (in_array($user->role_id, [2, 3])) {
            return redirect()->route('dosen.edit', $user->dosen->id);
        } elseif ($user->role_id === 4) {
            return redirect()->route('admin.edit', $user->admin->id);
        }

        // Handle other roles or redirect to a default route if needed
    }

    public function editPassword(User $user)
    {
        if (Auth::user()->id != $user->id) {
            abort(403, 'Tidak boleh mengintip');
        }

        return view('frontend.pages.update-password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|min:8',
            'Status_akun'
        ]);

        // Check if the provided current password matches the user's actual password
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }


        $password = $request->input('password');

        // // Use setAttribute to set the password attribute directly
        // $user->setAttribute('password', $password);

        $user->password = Hash::make($password);
        $user->status = $request->input('Status_akun');

        // Save the updated user record to the database
        $user->save();

        return redirect()->route('user.editPassword', $user->id)->with('success', 'Password berhasil di ubah.');
    }
}
