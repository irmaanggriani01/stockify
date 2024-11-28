@extends('layouts.manajergudang')

@section('content')
    <a href="{{ route('manajergudang.report.index') }}"
        class="btn btn-secondary text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <h1 class="text-3xl font-semibold mb-4">Riwayat Transaksi Barang Masuk dan Keluar</h1>
    <form method="GET" class="flex items-center space-x-4 mb-6">
        <select name="type" class="form-select p-2 border rounded">
            <option value="">Semua Tipe</option>
            <option value="masuk" {{ request('type') == 'masuk' ? 'selected' : '' }}>Masuk</option>
            <option value="keluar" {{ request('type') == 'keluar' ? 'selected' : '' }}>Keluar</option>
        </select>
        <input type="date" name="date" class="form-input p-2 border rounded" value="{{ request('date') }}"
            placeholder="Tanggal">
        <input type="month" name="month" class="form-input p-2 border rounded" value="{{ request('month') }}"
            placeholder="Bulan">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
    </form>
    <table class="table-auto w-full border border-gray-200">
        <thead class="text-white">
            <tr class="bg-blue-600">
                <th class="px-6 py-3 text-center">Produk</th>
                <th class="px-6 py-3 text-center">Jumlah</th>
                <th class="px-6 py-3 text-center">Tipe Transaksi</th>
                <th class="px-6 py-3 text-center">Tanggal</th>
                <th class="px-6 py-3 text-center">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="border px-6 py-3 text-center">{{ $transaction->product->name }}</td>
                    <td class="border px-6 py-3 text-center">{{ $transaction->quantity }}</td>
                    <td
                        class="border px-6 py-3 text-center 
                        @if ($transaction->type === 'masuk') text-green-600
                        @elseif ($transaction->type === 'keluar')
                            text-red-600
                        @else
                            text-gray-500 @endif
                    ">
                        {{ ucfirst($transaction->type ?? 'Tidak Diketahui') }}
                    </td>
                    <td class="border px-6 py-3 text-center">
                        {{ $transaction->created_at->timezone('Asia/Jakarta')->format('d M Y H:i:s') }}
                    </td>

                    <td class="border px-6 py-3 text-center align-middle">{{ $transaction->notes ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
