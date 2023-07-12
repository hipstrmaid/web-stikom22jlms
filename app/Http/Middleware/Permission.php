<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->id;
        $mahasiswa = Mahasiswa::findOrFail($id);
        $user_id = $mahasiswa->user_id;

        $id_user = Auth::id();

        if ($user_id == $id_user) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        abort(403, 'Akses Ditolak.');
    }
}
