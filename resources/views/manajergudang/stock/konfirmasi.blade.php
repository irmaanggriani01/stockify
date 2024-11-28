@extends('layouts.manajergudang')

@section('content')
    <div class="container mx-auto p-6">
        <a href="{{ route('manajergudang.stock.index') }}"
            class="inline-flex items-center px-5 py-2 bg-indigo-600 text-white hover:bg-indigo-700 rounded-lg mb-6">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

        <h1 class="text-3xl font-semibold mb-6 text-indigo-800">Daftar Transaksi yang Dikonfirmasi</h1>

        @if (session('success'))
            <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Transaksi -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
            <table class="min-w-full text-left table-auto">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-center font-semibold">No</th>
                        <th class="px-4 py-2 font-semibold">Produk</th>
                        <th class="px-4 py-2 text-center font-semibold">Jumlah</th>
                        <th class="px-4 py-2 text-center font-semibold">Tanggal</th>
                        <th class="px-4 py-2 text-center font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $index => $transaction)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 text-center text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ $transaction->product->name }}</td>
                            <td class="px-4 py-2 text-center text-gray-700">{{ $transaction->quantity }}</td>
                            <td class="px-4 py-2 text-center text-gray-500">
                                {{ $transaction->date->format('d M Y') }}</td>
                            <td class="px-4 py-2 text-center text-sm">
                                <span
                                    class="px-3 py-1 text-xs font-semibold inline-block rounded-full
                                    {{ $transaction->status == 'diterima' ? 'bg-green-200 text-green-800' : '' }}
                                    {{ $transaction->status == 'dikeluarkan' ? 'bg-yellow-200 text-yellow-800' : '' }}
                                    ">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
