@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.stock.index') }}"
        class="btn btn-secondary text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Pengaturan Stok Minimum</h1>

    <form action="{{ route('admin.stock.store_stock_minimum') }}" method="POST">
        @csrf

        <table class="min-w-50% text-left mx-auto">
            <thead class="bg-indigo-600 text-white">
                <tr class="bg-blue-600 border-b">
                    <th class="px-4 py-2 text-white">Nama Produk</th>
                    <th class="px-4 py-2 text-white">Stok Minimum</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-800 border">{{ $product->name }}</td>
                        <td class="px-4 py-2 border">
                            <input type="number" name="products[{{ $product->id }}][stok_minimum]"
                                value="{{ $product->stok_minimum }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                required>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 text-center">
            <button type="submit"
                class="btn btn-primary py-3 px-6 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-md transition-all duration-300 ease-in-out">
                Simpan Pengaturan Stok Minimum
            </button>
        </div>
    </form>
@endsection
