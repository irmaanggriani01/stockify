@extends('layouts.staffgudang')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-6">Manajemen Stok</h1>

    <!-- Konfirmasi Barang Masuk -->
    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-4">Konfirmasi Barang Masuk</h2>
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead class="text-white">
                <tr class="bg-blue-600">
                    <th class="p-3 text-center">Produk</th>
                    <th class="p-3 text-center">Jumlah</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incomingTransactions as $transaction)
                    <tr class="border-b">
                        <td class="p-3 text-center">{{ $transaction->product->name }}</td>
                        <td class="p-3 text-center">{{ $transaction->quantity }}</td>
                        <td class="p-3 text-center">{{ ucfirst($transaction->status) }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('staffgudang.stock.updateStatus', $transaction->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="border p-1">
                                    <option value="pending">Pending</option>
                                    <option value="diterima">Diterima</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="dikeluarkan">Dikeluarkan</option>
                                </select>
                                <button type="submit" class="ml-2 text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">Ubah</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Konfirmasi Barang Keluar -->
    <div>
        <h2 class="text-lg font-semibold mb-4">Konfirmasi Barang Keluar</h2>
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead class="text-white">
                <tr class="bg-blue-600">
                    <th class="p-3 text-center">Produk</th>
                    <th class="p-3 text-center">Jumlah</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outgoingTransactions as $transaction)
                    <tr class="border-b">
                        <td class="p-3 text-center">{{ $transaction->product->name }}</td>
                        <td class="p-3 text-center">{{ $transaction->quantity }}</td>
                        <td class="p-3 text-center">{{ ucfirst($transaction->status) }}</td>
                        <td class="p-3 text-center">
                            <form action="{{ route('staffgudang.stock.updateStatus', $transaction->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="border p-1">
                                    <option value="dikeluarkan">Dikeluarkan</option>
                                    <option value="pending">Pending</option>
                                    <option value="diterima">Diterima</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                                <button type="submit" class="ml-2 text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded">Ubah</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
