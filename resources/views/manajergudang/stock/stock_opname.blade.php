@extends('layouts.manajergudang')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Tombol Kembali -->
        <a href="{{ route('manajergudang.stock.index') }}"
            class="btn btn-secondary text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
            <i class="fa fa-arrow-left"></i>Kembali
        </a>
        <h1 class="text-2xl font-semibold mb-6">Stock Opname</h1>
        <form action="{{ route('manajergudang.stock.store_stock_opname') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-left text-gray-700 font-medium">Nama Produk</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-medium">Stok Tercatat</th>
                        <th class="py-3 px-4 text-left text-gray-700 font-medium">Stok Fisik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $product->name }}</td>
                            <td class="py-2 px-4">
                                {{ $product->stock_calculated ?? 0 }}
                            </td>
                            <td class="py-2 px-4">
                                <input type="number" name="products[{{ $product->id }}][stock_fisik]" required
                                    min="0"
                                    class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Masukkan stok fisik">
                                @error('products.' . $product->id . '.stock_fisik')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <button type="submit"
                class="w-full py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 mt-6">
                Simpan Stock Opname
            </button>
        </form>

    </div>
@endsection
