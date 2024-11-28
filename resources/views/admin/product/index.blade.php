@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')
    <a href="{{ route('admin.product.utama') }}"
        class="btn btn-secondary text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
        <i class="fa fa-arrow-left"></i>Kembali
    </a>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Daftar Produk</h1>
        <!-- Tombol Ekspor -->
        <a href="{{ route('admin.product.export') }}"
            class="inline-flex items-center px-5 py-2.5 bg-green-600 text-white font-medium text-sm rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Ekspor Data
        </a>

        <!-- Tombol Impor -->
        <form action="{{ route('admin.product.import') }}" method="POST" enctype="multipart/form-data"
            class="inline-flex items-center space-x-2">
            @csrf
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 bg-teal-600 text-white font-medium text-sm rounded-lg shadow hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Impor Data
            </button>
            <input type="file" name="file" accept=".xlsx, .xls, .csv" required
                class="text-sm text-gray-500 rounded border-gray-300 cursor-pointer">
        </form>


        @if (session('success'))
            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
            <table class="w-full text-sm text-left text-black-700">
                <thead class="text-xs text-white uppercase bg-blue-600">
                    <tr>
                        <th class="px-4 py-2 text-center border">Nama</th>
                        <th class="px-4 py-2 text-center border">SKU</th>
                        <th class="px-4 py-2 text-center border">Kategori</th>
                        <th class="px-4 py-2 text-center border">Deskripsi</th>
                        <th class="px-4 py-2 text-center border">Harga Beli</th>
                        <th class="px-4 py-2 text-center border">Harga Jual</th>
                        <th class="px-4 py-2 text-center border">Supplier</th>
                        <th class="px-4 py-2 text-center border">Gambar</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-center border">{{ $product->name }}</td>
                            <td class="px-4 py-2 text-center border">{{ $product->sku }}</td>
                            <td class="px-4 py-2 text-center selection:border">
                                {{ $product->kategori ? $product->kategori->name : '-' }}
                            </td>
                            <td class="px-4 py-2 text-center border">{{ $product->description }}</td>
                            <td class="px-4 py-2 text-center border">{{ $product->formatted_purchase_price }}</td>
                            <td class="px-4 py-2 text-center border">{{ $product->formatted_selling_price }}</td>
                            <td class="px-4 py-2 text-center">{{ $product->supplier->name ?? '-' }}
                            </td>
                            <td class="px-6 py-6 text-center">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center border">
                                <div class="inline-flex items-center space-x-2">
                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 17l-1.5-1.5m0 0l-2-2m2 2l2-2m-2 2V7m6 0h2m0 0a2 2 0 112-2m-2 2h-2m6 0V7m0 6H7m4-4V7m0 4H7m4 0a2 2 0 012-2m2 2a2 2 0 11-2 2z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
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
