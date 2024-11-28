@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Manajemen Stok</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Toast Notifications -->
    @if ($stockWarnings)
        <div id="toast-container" class="fixed top-4 right-4 space-y-2 z-50">
            @foreach ($stockWarnings as $warning)
                <div
                    class="toast-item bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-lg flex items-start space-x-2 animate-fade-in">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1"></i>
                    <span>{{ $warning }}</span>
                    <button type="button" class="ml-auto text-yellow-500 hover:text-yellow-700 focus:outline-none"
                        onclick="this.parentElement.remove()">✖</button>
                </div>
            @endforeach
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Riwayat Transaksi Barang -->
        <div
            class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 hover:shadow-xl transition-all duration-300 ease-in-out">
            <a href="{{ route('admin.stock.transactions') }}"
                class="block text-center text-white bg-blue-600 hover:bg-blue-700 py-3 px-4 rounded-lg font-semibold transition-colors duration-300">
                Riwayat Transaksi Barang
            </a>
        </div>

        <!-- Stock Opname -->
        <div
            class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 hover:shadow-xl transition-all duration-300 ease-in-out">
            <a href="{{ route('admin.stock.stock_opname') }}"
                class="block text-center text-white bg-green-600 hover:bg-green-700 py-3 px-4 rounded-lg font-semibold transition-colors duration-300">
                Stock Opname
            </a>
        </div>

        <!-- Pengaturan Stok Minimum -->
        <div
            class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 hover:shadow-xl transition-all duration-300 ease-in-out">
            <a href="{{ route('admin.stock.stock_minimum') }}"
                class="block text-center text-white bg-yellow-600 hover:bg-yellow-700 py-3 px-4 rounded-lg font-semibold transition-colors duration-300">
                Pengaturan Stok Minimum
            </a>
        </div>
    </div>
@endsection
