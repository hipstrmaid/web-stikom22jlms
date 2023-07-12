<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        return Auth::id() == Auth::user()->mahasiswa->user_id || Auth::user()->dosen->user_id;
    }
}
