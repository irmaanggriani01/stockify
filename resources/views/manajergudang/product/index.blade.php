@extends('layouts.manajergudang')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Daftar Produk</h1>

        @if (session('success'))
            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pencarian dan Filter Kategori -->
        <form action="{{ route('manajergudang.product.index') }}" method="GET" class="mb-4 flex space-x-2">
            <input type="text" name="search" placeholder="Cari produk..." class="py-2 px-4 border border-gray-300 rounded"
                value="{{ request('search') }}">
            <select name="category" class="py-2 px-4 border border-gray-300 rounded">
                <option value="">Filter Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-blue-600">Cari</button>
        </form>

        <!-- Tombol Import/Export -->
        <div class="mb-4 flex space-x-2">
            <a href="{{ route('manajergudang.product.create') }}"
                class="inline-block bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Tambah Data Produk</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left table-auto">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center border border-gray-300">Nama</th>
                        <th class="px-4 py-2 text-center border border-gray-300">SKU</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Kategori</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Deskripsi</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Harga Beli</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Harga Jual</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Supplier</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Gambar</th>
                        <th class="px-4 py-2 text-center border border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $product->name }}</td>
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $product->sku }}</td>
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $product->kategori->name ?? '-' }}</td>
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $product->description }}</td>
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $product->formatted_purchase_price }}</td>
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $product->formatted_selling_price }}</td>
                            <td class="px-4 py-2 text-center border border-gray-300">{{ $product->supplier->name ?? '-' }}</td>
                            <td class="px-6 py-6 text-center border border-gray-300">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="px-4 py-2 text-center border border-gray-300">
                                <div class="inline-flex items-center space-x-2">
                                    <a href="{{ route('manajergudang.product.edit', $product->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 17l-1.5-1.5m0 0l-2-2m2 2l2-2m-2 2V7m6 0h2m0 0a2 2 0 112-2m-2 2h-2m6 0V7m0 6H7m4-4V7m0 4H7m4 0a2 2 0 012-2m2 2a2 2 0 11-2 2z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('manajergudang.product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
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

        <!-- Link pagination -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
