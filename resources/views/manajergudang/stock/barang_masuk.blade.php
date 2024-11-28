@extends('layouts.manajergudang')

@section('content')
    <div class="container mx-auto p-4">
        <a href="{{ route('manajergudang.stock.index') }}"
            class="btn btn-secondary text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

        <h1 class="text-2xl font-semibold mb-6">Transaksi Barang Masuk</h1>

        <form action="{{ route('manajergudang.stock.store_barang_masuk') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="product_id" class="block text-gray-700 font-medium">Produk:</label>
                <select id="product_id" name="product_id"
                    class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Produk</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-medium">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" required
                    class="form-input mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="supplier_id" class="block text-gray-700 font-medium">Supplier:</label>
                <select id="supplier_id" name="supplier_id"
                    class="form-select mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="notes" class="block text-gray-700 font-medium">Catatan:</label>
                <textarea id="notes" name="notes" rows="4"
                    class="form-textarea mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <div class="mb-4">
                <input type="hidden" name="type" value="masuk">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="status" value="pending">
                <input type="hidden" name="date" value="{{ now()->toDateString() }}">
            </div>

            <button type="submit"
                class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Simpan Transaksi Masuk
            </button>
        </form>
    </div>
@endsection
