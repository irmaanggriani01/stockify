@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <a href="{{ route('admin.product.attribute.index') }}"
            class="btn btn-secondary text-white bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
            <i class="fa fa-arrow-left"></i>Kembali
        </a>

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Attribute Produk</h1>

        <form action="{{ route('admin.product.attribute.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf

            <!-- Pilih Produk -->
            <div>
                <label for="product_id" class="block mb-2 text-sm font-medium text-gray-700">Nama Produk</label>
                <select name="product_id" id="product_id"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Value -->
            <div>
                <label for="value" class="block mb-2 text-sm font-medium text-gray-700">Value</label>
                <select name="value" id="value"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>
                    <option value="Katun">Katun</option>
                    <option value="Denim">Denim</option>
                    <option value="Polyster">Polyster</option>
                    <option value="Katun Pique">Katun Pique</option>
                    <option value="Katun Combade">Katun Combade</option>
                    <option value="Katun">Katun</option>
                </select>
            </div>

            <!-- Input Size -->
            <div>
                <label for="size" class="block mb-2 text-sm font-medium text-gray-700">Size</label>
                <input type="text" name="size" id="size" value="{{ old('size') }}"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <!-- Input Color -->
            <div>
                <label for="color" class="block mb-2 text-sm font-medium text-gray-700">Color</label>
                <input type="text" name="color" id="color" value="{{ old('color') }}"
                    class="block w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white font-medium text-sm rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7v14" />
                    </svg>
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
