@extends('layouts.staffgudang')

@section('content')
    <div class="container mx-auto p-6">
        {{-- Header --}}
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

        {{-- Show Success Notification --}}
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Barang Masuk --}}
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Barang Masuk yang Perlu Diperiksa</h2>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-300">
                    <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                        <tr>
                            <th scope="col" class="px-6 text-center py-3">Produk</th>
                            <th scope="col" class="px-6 text-center py-3">Jumlah</th>
                            <th scope="col" class="px-6 text-center py-3">Catatan</th>
                            <th scope="col" class="px-6 text-center py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($incomingTasks as $task)
                            @if (!$task->is_checked)
                                <!-- Only show tasks that are not checked -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 text-center py-4">{{ $task->product->name }}</td>
                                    <td class="px-6 text-center py-4">{{ $task->quantity }}</td>
                                    <td class="px-6 text-center py-4">{{ $task->notes }}</td>
                                    <td class="px-6 text-center py-4">
                                        <form action="{{ route('stock.check', $task->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">
                                                Selesai
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada barang masuk yang
                                    perlu diperiksa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Barang Keluar --}}
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Barang Keluar yang Perlu Disiapkan</h2>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-300">
                    <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                        <tr>
                            <th scope="col" class="px-6 text-center py-3">Produk</th>
                            <th scope="col" class="px-6 text-center py-3">Jumlah</th>
                            <th scope="col" class="px-6 text-center py-3">Catatan</th>
                            <th scope="col" class="px-6 text-center py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($outgoingTasks as $task)
                            @if (!$task->is_checked)
                                <!-- Only show tasks that are not checked -->
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 text-center py-4">{{ $task->product->name }}</td>
                                    <td class="px-10 text-center py-4">{{ $task->quantity }}</td>
                                    <td class="px-10 text-center py-4">{{ $task->notes }}</td>
                                    <td class="px-6 text-center py-4">
                                        <form action="{{ route('stock.check', $task->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">
                                                Selesai
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada barang keluar yang
                                    perlu disiapkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
