@extends('layouts.admin')

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

    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Jumlah Produk -->
            <div class="bg-red-400 p-4 rounded shadow flex items-center space-x-4">
                <div class="text-4xl text-blue-500">
                    <i class="fas fa-cogs"></i> <!-- Ikon produk -->
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Jumlah Produk</h3>
                    <p class="text-2xl">{{ $productsCount }}</p>
                </div>
            </div>

            <!-- Transaksi Masuk -->
            <div class="bg-sky-400 p-4 rounded shadow flex items-center space-x-4">
                <div class="text-4xl text-green-500">
                    <i class="fas fa-arrow-down"></i> <!-- Ikon transaksi masuk -->
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Transaksi Masuk</h3>
                    <p class="text-2xl">{{ $transactionsInCount }}</p>
                </div>
            </div>

            <!-- Transaksi Keluar -->
            <div class="bg-yellow-400 p-4 rounded shadow flex items-center space-x-4">
                <div class="text-4xl text-red-500">
                    <i class="fas fa-arrow-up"></i> <!-- Ikon transaksi keluar -->
                </div>
                <div>
                    <h3 class="text-xl font-semibold">Transaksi Keluar</h3>
                    <p class="text-2xl">{{ $transactionsOutCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Kategori menggunakan Chart.js -->
    <canvas id="categoryChart" width="800" height="400" style="max-width: 55%;"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('categoryChart').getContext('2d');
            var categories = {!! json_encode($categories) !!};
            var productCounts = {!! json_encode($productCounts->values()) !!};

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: categories,
                    datasets: [{
                        label: 'Jumlah Produk',
                        data: productCounts,
                        backgroundColor: 'rgba(151, 167, 174, 0.8)', // Warna background baru (merah muda)
                        borderColor: 'rgba(151, 167, 174, 1)', // Warna border baru
                        borderWidth: 2 // Ukuran border lebih tebal
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'rgba(75, 192, 192, 1)' // Warna label y-axis
                            }
                        },
                        x: {
                            ticks: {
                                color: 'rgba(75, 192, 192, 1)' // Warna label x-axis
                            }
                        }
                    }
                }
            });
        });
    </script>

    <!-- Tampilkan 3 aktivitas terakhir -->
    <h3 class="text-lg font-semibold">Aktivitas Terbaru</h3>
    <table class="min-w-full border-collapse bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 text-left">User</th>
                <th class="py-2 px-4 text-left">Deskripsi Aktivitas</th>
                <th class="py-2 px-4 text-left">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latestActivities as $activity)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $activity->user->name ?? 'Tidak ada nama' }}</td>
                    <td class="py-2 px-4">{{ $activity->activity_description }}</td>
                    <td class="py-2 px-4 text-gray-500">{{ $activity->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer class="absolute top-4 right-4 text-gray-500 italic text-sm">
        created by : Irma Anggriani Leasa
    </footer>
@endsection
