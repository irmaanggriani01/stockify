@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Pengaturan Umum Aplikasi</h1>

    @if (session('success'))
        <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded px-8 py-6 mb-6">
        @csrf
        <div class="mb-4">
            <label for="app_name" class="block text-sm font-medium text-gray-700">Nama Aplikasi</label>
            <input type="text" name="app_name" id="app_name" value="{{ old('app_name', $settings['app_name'] ?? '') }}"
                class="mt-1 block w-full rounded-md border-2 border-black focus:border-gray-600 focus:ring focus:ring-gray-500 focus:ring-opacity-50 p-2"
                required>
            @error('app_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="app_logo" class="block text-sm font-medium text-gray-700">Logo Aplikasi</label>
            <input type="file" name="app_logo" id="app_logo"
                class="mt-1 block w-full rounded-md border-2 border-black focus:border-gray-600 focus:ring focus:ring-gray-500 focus:ring-opacity-50 p-2">
            @if (!empty($settings['app_logo']))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $settings['app_logo']) }}" alt="Logo" class="h-20">
                </div>
            @endif
            @error('app_logo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            Simpan Pengaturan
        </button>
    </form>

    <h2 class="text-xl font-semibold mt-6">Hasil Perubahan</h2>
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border border-gray-300 bg-white shadow-md rounded-lg">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Field</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">Nama Aplikasi</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $settings['app_name'] ?? 'Belum diatur' }}</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">Logo Aplikasi</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if (!empty($settings['app_logo']))
                            <img src="{{ asset('storage/' . $settings['app_logo']) }}" alt="Logo" class="h-20">
                        @else
                            <span class="text-gray-500">Belum ada logo</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
