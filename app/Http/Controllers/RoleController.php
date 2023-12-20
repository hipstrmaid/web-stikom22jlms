<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.role-create', ['roles' => $roles]);
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
        $request->validate([
            'nama_role' => ['required'],
        ]);

        $nama_role = $request->input('nama_role');

        Role::create([
            'nama_role' => $nama_role,
            'created_at' => now(),
        ]);

        return redirect()->back();
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
        // Find the role by ID
        $role = Role::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'nama_role' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Update the role with the validated data
        $role->update($validatedData);

        // Redirect or return a response
        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by ID
        $role = Role::findOrFail($id);

        // Perform the deletion
        $role->delete();

        // Redirect or return a response
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
