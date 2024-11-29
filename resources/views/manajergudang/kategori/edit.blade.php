@extends('layouts.manajergudang')

@section('title', 'Edit Kategori Produk')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Kategori Produk</h1>

        <form action="{{ route('manajergudang.kategori.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nama Kategori</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                    class="w-full py-2 px-4 border border-gray-300 rounded" placeholder="Masukkan Nama Kategori" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
                <a href="{{ route('manajergudang.kategori.index') }}"
                    class="ml-2 text-gray-600 hover:text-gray-800">Kembali ke Daftar Kategori</a>
            </div>
        </form>
    </div>
@endsection
