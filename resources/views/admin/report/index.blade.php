@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Laporan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Laporan Stok Barang -->
        <a href="{{ route('admin.report.stock') }}"
           class="block p-6 bg-blue-100 border border-blue-300 rounded-lg hover:bg-blue-200">
            <h2 class="text-lg font-semibold text-blue-700">Laporan Stok Barang</h2>
            <p class="text-sm text-blue-600 mt-2">Lihat laporan stok barang berdasarkan kategori atau periode tertentu.</p>
        </a>

        <!-- Laporan Transaksi -->
        <a href="{{ route('admin.report.transaction') }}"
           class="block p-6 bg-green-100 border border-green-300 rounded-lg hover:bg-green-200">
            <h2 class="text-lg font-semibold text-green-700">Laporan Transaksi</h2>
            <p class="text-sm text-green-600 mt-2">Lihat laporan transaksi barang masuk dan keluar berdasarkan periode.</p>
        </a>

        <!-- Laporan Aktivitas Pengguna -->
        <a href="{{ route('admin.report.user') }}"
           class="block p-6 bg-yellow-100 border border-yellow-300 rounded-lg hover:bg-yellow-200">
            <h2 class="text-lg font-semibold text-yellow-700">Laporan Aktivitas Pengguna</h2>
            <p class="text-sm text-yellow-600 mt-2">Lihat aktivitas pengguna seperti transaksi yang mereka lakukan.</p>
        </a>
    </div>
</div>
@endsection
