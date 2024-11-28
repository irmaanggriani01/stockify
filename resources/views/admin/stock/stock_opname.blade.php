@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Tombol Kembali -->
        <a href="{{ route('admin.stock.index') }}"
            class="btn btn-secondary text-white bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
            <i class="fa fa-arrow-left"></i>Kembali
        </a>

        <!-- Judul Halaman -->
        <h1 class="text-2xl font-semibold mb-6">Stock Opname</h1>

        <!-- Form Stock Opname -->
        <form action="{{ route('admin.stock.store_stock_opname') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <!-- Tabel Produk -->
            <table class="min-w-full text-left table-auto">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-center align-middle font-medium">Nama Produk</th>
                        <th class="py-3 px-4 text-center align-middle font-medium">Stok Tercatat</th>
                        <th class="py-3 px-4 text-center align-middle font-medium">Stok Fisik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <!-- Nama Produk -->
                            <td class="py-2 px-4 text-center align-middle">{{ $product->name }}</td>

                            <!-- Stok Tercatat -->
                            <td class="py-2 px-4 text-center align-middle">
                                @php
                                    // Hitung stok tercatat
                                    $total_in = $stock_in_transactions
                                        ->where('product_id', $product->id)
                                        ->sum('quantity');
                                    $total_out = $stock_out_transactions
                                        ->where('product_id', $product->id)
                                        ->sum('quantity');
                                    $stock_recorded = $total_in - $total_out;
                                @endphp
                                {{ $stock_recorded }}
                            </td>

                            <!-- Stok Fisik -->
                            <td class="py-2 px-4 text-center align-middle">
                                {{ $product->stock_recorded }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
@endsection
