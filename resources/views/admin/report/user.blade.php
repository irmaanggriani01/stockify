@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.report.index') }}"
        class="btn btn-secondary text-white bg-blue-600 hover:bg-indigo-400 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
        <i class="fa fa-arrow-left"></i>Kembali
    </a>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Laporan Aktivitas Pengguna</h1>

        <table class="w-full border-collapse border border-blue-600">
            <thead class="text-white">
                <tr class="bg-blue-600">
                    <th class="border p-2">Nama Pengguna</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Jumlah Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2 text-center">{{ $user->stock_transactions_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
