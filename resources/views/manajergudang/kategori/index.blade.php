@extends('layouts.manajergudang')

@section('title', 'Daftar Kategori Produk')

@section('content')

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Daftar Kategori Produk</h1>

        <a href="{{ route('manajergudang.kategori.create') }}"
            class="inline-block bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Tambah Kategori Produk</a>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full text-left table-auto">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center border border-gray-300">Nama Kategori</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category) <!-- Menggunakan $category bukan $categories -->
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $category->name }}</td> <!-- Menggunakan $category->name -->
                            <td class="px-4 py-2 text-center border border-gray-300">
                                <div class="inline-flex items-center space-x-2">
                                    <a href="{{ route('manajergudang.kategori.edit', $category->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400">
                                        Edit
                                    </a>

                                    <form action="{{ route('manajergudang.kategori.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination links -->
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>

@endsection
