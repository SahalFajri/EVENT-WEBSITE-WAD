<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')->get();
        return view('dashboard.admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'phone' => 'nullable|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $validated['password'] = Hash::make($validated['password']);

        $validated['role'] = 'admin';
        User::create($validated);

        return redirect()->route('dashboard.admin.index')->with('success', 'Admin created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $Admin)
    {
        return view('dashboard.admin.show', ['user' => $Admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $Admin)
    {
        return view('dashboard.admin.edit', ['user' => $Admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $Admin)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $Admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($Admin->profile_picture) {
                Storage::disk('public')->delete($Admin->profile_picture);
            }
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $Admin->update($validated);

        return redirect()->route('dashboard.admin.index')->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $Admin)
    {
        if ($Admin->profile_picture) {
            Storage::disk('public')->delete($Admin->profile_picture);
        }

        $Admin->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }
}
