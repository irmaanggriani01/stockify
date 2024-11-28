@extends('layouts.manajergudang')

@section('title', 'Edit Produk')

@section('content')

    <a href="{{ route('manajergudang.product.index') }}"
        class="btn btn-secondary text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Produk</h1>

        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Produk:</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- SKU -->
            <div>
                <label class="block text-sm font-medium text-gray-700">SKU:</label>
                <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori:</label>
                <select name="category_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi:</label>
                <textarea name="description" rows="3" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Harga Beli -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga Beli:</label>
                <input type="number" step="0.01" name="purchase_price"
                    value="{{ old('purchase_price', $product->purchase_price) }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Harga Jual -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga Jual:</label>
                <input type="number" step="0.01" name="selling_price"
                    value="{{ old('selling_price', $product->selling_price) }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Supplier -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Supplier:</label>
                <select name="supplier_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="" disabled>Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}"
                            {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar:</label>
                <input type="file" name="image" accept="image/*" class="mt-1 block w-full">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk"
                        class="mt-2 w-32 h-32 object-cover">
                @endif
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
@endsection
