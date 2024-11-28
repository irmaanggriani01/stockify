@extends('layouts.manajergudang')

@section('content')

    <div class="container mx-auto p-4">

        <h1 class="text-2xl font-semibold mb-6">Manajemen Stok</h1>

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

        <div class="space-y-4 mt-10">
            <a href="{{ route('manajergudang.stock.barang_masuk') }}"
                class="block text-center text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full sm:w-auto">
                Transaksi Barang Masuk
            </a>

            <a href="{{ route('manajergudang.stock.barang_keluar') }}"
                class="block text-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full sm:w-auto">
                Transaksi Barang Keluar
            </a>
            <a href="{{ route('manajergudang.stock.stock_opname') }}"
                class="block text-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full sm:w-auto">
                Stock Opname
            </a>
            <a href="{{ route('manajergudang.stock.konfirmasi') }}"
                class="block text-center text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full sm:w-auto">
                Status Produk
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Auto-hide toast after 5 seconds
        setTimeout(() => {
            const toastItems = document.querySelectorAll('.toast-item');
            toastItems.forEach(item => item.classList.add('animate-fade-out'));
            setTimeout(() => toastItems.forEach(item => item.remove()), 1000);
        }, 5000);
    </script>

    <style>
        /* Toast Animations */
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-out {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease-in-out forwards;
        }

        .animate-fade-out {
            animation: fade-out 0.5s ease-in-out forwards;
        }
    </style>
@endsection
