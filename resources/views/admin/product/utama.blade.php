@extends('layouts.admin')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Manajemen Produk</h1>

        <!-- Tombol Navigasi -->
        <div class="mb-4 flex space-x-2">
            <a href="{{ route('admin.product.attribute.index') }}"
                class="inline-flex items-center px-5 py-2.5 bg-gray-600 text-white font-medium text-sm rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l4-4m0 0l4-4m-4 4H3" />
                </svg>
                Manajemen Kategori Produk
            </a>
            <a href="{{ route('admin.product.index') }}"
                class="inline-flex items-center px-5 py-2.5 bg-green-600 text-white font-medium text-sm rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m-4 4l4-4m0 0l4 4" />
                </svg>
                Manajemen Data Produk
            </a>
        </div>

        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif
    </div>
@endsection
