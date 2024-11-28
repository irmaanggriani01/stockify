@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <a href="{{ route('admin.report.index') }}"
            class="btn btn-secondary text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold mb-4">Laporan Transaksi Barang</h1>

        <form method="GET" class="flex items-center space-x-4 mb-6">
            <select name="type" class="form-select p-2 border rounded">
                <option value="">Semua Transaksi</option>
                <option value="Masuk" {{ request('type') == 'Masuk' ? 'selected' : '' }}>Barang Masuk</option>
                <option value="Keluar" {{ request('type') == 'Keluar' ? 'selected' : '' }}>Barang Keluar</option>
            </select>
            <input type="date" name="date" class="form-input p-2 border rounded" value="{{ request('date') }}"
                placeholder="Tanggal">
            <input type="month" name="month" class="form-input p-2 border rounded" value="{{ request('month') }}"
                placeholder="Bulan">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
        </form>

        <table class="w-full border-collapse border">
            <thead class="text-xs text-white uppercase bg-blue-600">
                <tr class="bg-blue-600">
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Barang</th>
                    <th class="border p-2">Tipe</th>
                    <th class="border p-2">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td class="border px-6 py-3 text-center">
                            {{ $transaction->created_at->timezone('Asia/Jakarta')->format('d M Y H:i:s') }}
                        </td>
                        <td class="border p-2">{{ $transaction->product->name }}</td>
                        <td
                            class="border p-2 text-center 
                        @if ($transaction->type === 'masuk') text-green-600
                        @elseif ($transaction->type === 'keluar')
                            text-red-600
                        @else
                            text-gray-500 @endif
                    ">
                            {{ ucfirst($transaction->type ?? 'Tidak Diketahui') }}
                        </td>
                        <td class="border p-2 text-center">{{ $transaction->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-2 text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
