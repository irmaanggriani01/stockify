<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = User::select('role')->distinct()->pluck('role');
        return view('admin.user.create', compact('roles'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
    
        // Ambil data role yang unik dari tabel users
        $roles = User::select('role')->distinct()->pluck('role');
        
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'role' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Membuat user baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function update(Request $request, User $user)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update the user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui');
    }
}
