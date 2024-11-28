@extends('layouts.manajergudang')

@section('content')
<div class="container mx-auto p-4">
    <a href="{{ url()->previous() }}" class="btn btn-secondary text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-lg mb-4 inline-flex items-center">
        <i class="fa fa-arrow-left"></i> Kembali
    </a>

    <h1 class="text-2xl font-semibold mb-6">Daftar Supplier</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        @if($suppliers->isEmpty())
            <p class="text-gray-600">Tidak ada supplier yang tersedia.</p>
        @else
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Supplier</th>
                        <th class="border px-4 py-2">Alamat</th>
                        <th class="border px-4 py-2">Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $index => $supplier)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $supplier->name }}</td>
                            <td class="border px-4 py-2">{{ $supplier->address ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $supplier->phone ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
