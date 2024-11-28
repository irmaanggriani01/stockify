<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        // Mengambil data pertama atau membuat instans baru jika tidak ada
        $settings = Setting::firstOrNew([]);
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'app_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data pertama atau buat baru jika tidak ada
        $settings = Setting::firstOrNew([]);

        // Simpan nama aplikasi
        $settings->app_name = $request->app_name;

        // Simpan logo aplikasi jika ada
        if ($request->hasFile('app_logo')) {
            // Hapus logo lama jika ada
            if ($settings->app_logo) {
                Storage::disk('public')->delete($settings->app_logo);
            }

            // Simpan logo baru
            $settings->app_logo = $request->file('app_logo')->store('logos', 'public');
        }

        $settings->save();

        return redirect()->route('admin.setting.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
