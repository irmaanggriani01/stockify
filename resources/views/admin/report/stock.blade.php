@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <a href="{{ route('admin.report.index') }}"
            class="btn btn-secondary text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold mb-4">Laporan Stok Barang</h1>

        <form method="GET" class="flex items-center space-x-4 mb-6">
            <select name="category" class="form-select p-2 border rounded">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == request('category') ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <input type="date" name="date" class="form-input p-2 border rounded" value="{{ request('date') }}"
                placeholder="Tanggal">
            <input type="month" name="month" class="form-input p-2 border rounded" value="{{ request('month') }}"
                placeholder="Bulan">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Filter</button>
        </form>

        <table class="w-full border-collapse border border-gray-300">
            <thead class="text-white">
                <tr class="bg-blue-600">
                    <th class="border p-2">Nama Barang</th>
                    <th class="border p-2">Kategori</th>
                    <th class="border p-2">Stok Akhir</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="border text-center p-2">{{ $product->name }}</td>
                        <td class="border text-center p-2">{{ $product->kategori ? $product->kategori->name : '-' }}</td>
                        <td class="border text-center p-2">{{ $product->stock_recorded }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border p-2 text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
