<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        $settings = Setting::first();
        return view('auth.login', compact ('settings'));
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('email', 'password');

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            // Mendapatkan pengguna yang sedang login
            $user = Auth::user();

            // Catat aktivitas login
            Activity::create([
                'user_id' => $user->id,
                'activity_type' => 'login',
                'activity_description' => 'User logged in',
            ]);

            // Redirect berdasarkan peran pengguna
            $role = $user->role; // Misalkan 'role' adalah nama kolom yang menyimpan peran

            switch ($role) {
                case 'Admin':
                    return redirect()->route('admin.dashboard.index')->with('success', 'Selamat datang di halaman Admin.');
                case 'Staff Gudang':
                    return redirect()->route('staffgudang.dashboard.index')->with('success', 'Selamat datang di halaman Staff Gudang.');
                case 'Manajer Gudang':
                    return redirect()->route('manajergudang.dashboard.index')->with('success', 'Selamat datang di halaman Manajer Gudang.');
                default:
                    return redirect('/')->with('success', 'Selamat datang!'); // Redirect default jika peran tidak ditemukan
            }
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan kesalahan
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->withInput(); // Dengan input untuk memudahkan pengguna mengisi ulang form
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Catat aktivitas logout
        Activity::create([
            'user_id' => Auth::id(),
            'activity_type' => 'logout',
            'activity_description' => 'User logged out',
        ]);

        // Logout pengguna
        Auth::logout();

        // Menghapus session dan token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
