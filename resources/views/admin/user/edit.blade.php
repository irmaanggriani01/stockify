@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('name', $user->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @foreach ($roles as $role)
                    <option value="{{ $role }}" {{ old('role', $user->role) == $role ? 'selected' : '' }}>
                        {{ ucfirst($role) }}
                    </option>
                @endforeach
            </select>
            @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
    </form>
@endsection
