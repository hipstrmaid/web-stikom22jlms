<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard after Authenticated.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->role_id != 4) {
            $matkuls = Matkul::all()->groupBy('semester_id')->sortBy(function ($items, $key) {
                return $key;
            });

            return view('frontend.pages.dashboard', ['matkuls' => $matkuls]);
        } else {
            $mahasiswaTotal = User::where('role_id', 1)->count();
            $dosenTotal = User::where('role_id', 2)->count();
            $baakTotal = User::where('role_id', 3)->count();
            $adminTotal = User::where('role_id', 4)->count();

            return view('admin.admin-dashboard', compact('mahasiswaTotal', 'dosenTotal', 'baakTotal', 'adminTotal'));
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
