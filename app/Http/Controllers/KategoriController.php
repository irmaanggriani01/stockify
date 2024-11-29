<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        // Mengambil data kategori dengan pagination
        $categories = Kategori::paginate(10); 

        return view('manajergudang.kategori.index', compact('categories'));
    }

    // Menampilkan form untuk menambah kategori
    public function create()
    {
        return view('manajergudang.kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name', // Pastikan nama kategori unik
        ]);

        // Menyimpan kategori baru ke database
        Kategori::create([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke daftar kategori dengan pesan sukses
        return redirect()->route('manajergudang.kategori.index')->with('success', 'Kategori produk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        // Mengambil data kategori berdasarkan ID
        $category = Kategori::findOrFail($id);

        // Mengirimkan data kategori ke view
        return view('manajergudang.kategori.edit', compact('category'));
    }

    // Memperbarui kategori yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id, // Memastikan kategori yang sedang diedit tetap bisa menggunakan nama yang sama
        ]);

        // Mencari kategori yang akan diperbarui
        $category = Kategori::findOrFail($id);

        // Memperbarui nama kategori
        $category->update([
            'name' => $request->name,
        ]);

        // Mengarahkan kembali ke daftar kategori dengan pesan sukses
        return redirect()->route('manajergudang.kategori.index')->with('success', 'Kategori produk berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        // Mencari kategori yang akan dihapus
        $category = Kategori::findOrFail($id);

        // Menghapus kategori dari database
        $category->delete();

        // Mengarahkan kembali ke daftar kategori dengan pesan sukses
        return redirect()->route('manajergudang.kategori.index')->with('success', 'Kategori produk berhasil dihapus.');
    }
}
