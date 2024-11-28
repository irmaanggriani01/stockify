@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.stock.index') }}"
        class="btn btn-secondary text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <h1 class="text-3xl font-semibold mb-4">Riwayat Transaksi Barang Masuk dan Keluar</h1>

    <table class="table-auto w-full border border-blue-200">
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
                    <td class="px-6 py-3 text-center border">{{ $transaction->product->name }}</td>
                    <td class="px-6 py-3 text-center border">{{ $transaction->quantity }}</td>
                    <td
                        class="px-6 py-3 text-center border
                        @if ($transaction->type === 'masuk') text-green-600
                        @elseif ($transaction->type === 'keluar')
                            text-red-600
                        @else
                            text-gray-500 @endif
                    ">
                        {{ ucfirst($transaction->type ?? 'Tidak Diketahui') }}
                    </td>
                    <td class="px-6 py-3 text-center border">
                        {{ $transaction->created_at->timezone('Asia/Jakarta')->format('d M Y H:i:s') }}
                    </td>

                    <td class="px-6 py-3 text-center align-middle border">{{ $transaction->notes ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
