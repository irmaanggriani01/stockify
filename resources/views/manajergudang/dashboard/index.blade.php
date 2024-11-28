@extends('layouts.manajergudang')

@section('content')
    <div class="flex justify-center items-center">
        <h1 class="text-5xl font-extrabold text-black-600">
            {{ $settings['app_name'] ?? 'Stokify' }}
        </h1>
    </div>

    <div class="flex justify-center">
        @if (!empty($settings['app_logo']))
            <img src="{{ asset('storage/' . $settings['app_logo']) }}" alt="Logo" class="h-64 mx-auto">
        @else
            <span class="text-gray-500">Belum ada logo</span>
        @endif
    </div>

    <!-- Ringkasan informasi stok -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <!-- Stok Menipis -->
        <div class="p-4 border rounded-lg bg-yellow-300">
            <h3 class="text-xl font-semibold">Stok Menipis</h3>
            <ul>
                @foreach ($stockLow as $product)
                    <li>{{ $product->name }} - {{ $product->stock_recorded }} unit</li>
                @endforeach
            </ul>
        </div>

        <!-- Barang Masuk Hari Ini -->
        <div class="p-4 border rounded-lg bg-sky-300">
            <h3 class="text-xl font-semibold">Barang Masuk Hari Ini</h3>
            <ul>
                @foreach ($productsInToday as $transaction)
                    <li>{{ $transaction->product->name }} - {{ $transaction->quantity }} unit</li>
                @endforeach
            </ul>
        </div>

        <!-- Barang Keluar Hari Ini -->
        <div class="p-4 border rounded-lg bg-red-300">
            <h3 class="text-xl font-semibold">Barang Keluar Hari Ini</h3>
            <ul>
                @foreach ($productsOutToday as $transaction)
                    <li>{{ $transaction->product->name }} - {{ $transaction->quantity }} unit</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
