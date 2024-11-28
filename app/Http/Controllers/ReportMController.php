<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\Kategori;

class ReportMController extends Controller
{
    public function index()
    {
        return view('manajergudang.report.index');
    }

    // Laporan Stok Barang
    public function stockReport(Request $request)
    {
        $categories = Kategori::all(); // Ambil semua kategori

        $category = $request->category;
        $date = $request->date; // Menggunakan satu tanggal saja

        // Query produk untuk perhitungan stok per produk
        $products = Product::query()
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category); // Filter kategori
            })
            ->with(['kategori'])
            ->withSum(['stockTransactions as total_incoming' => function ($query) use ($date) {
                $query->where('type', 'masuk')
                      ->whereNotIn('status', ['Pending', 'Ditolak']); // Exclude Pending and Ditolak transactions
                if ($date) {
                    $query->whereDate('date', $date); // Filter berdasarkan satu tanggal
                }
            }], 'quantity')
            ->withSum(['stockTransactions as total_outgoing' => function ($query) use ($date) {
                $query->where('type', 'keluar')
                      ->whereNotIn('status', ['Pending', 'Ditolak']); // Exclude Pending and Ditolak transactions
                if ($date) {
                    $query->whereDate('date', $date); // Filter berdasarkan satu tanggal
                }
            }], 'quantity')
            ->get();

        // Hitung stok akhir untuk setiap produk
        $totalStock = 0;
        foreach ($products as $product) {
            // Stok akhir = total barang masuk - total barang keluar
            $product->stock_recorded = ($product->total_incoming ?? 0) - ($product->total_outgoing ?? 0);
            $totalStock += $product->stock_recorded; // Tambahkan stok ke total
        }

        // Kirim data ke view
        return view('manajergudang.report.stock', compact('products', 'categories', 'category', 'date', 'totalStock'));
    }

    // Laporan Transaksi Barang Masuk dan Keluar
    public function transactionReport(Request $request)
    {
        $type = $request->type;  // Transaction type (masuk or keluar)
        $category = $request->category; // Category filter
        $date = $request->date;  // Single date filter

        $transactions = StockTransaction::query();

        // Filter by transaction type if provided
        if ($type) {
            $transactions->where('type', $type);
        }

        // Filter by category if provided (if category is used in transaction relations)
        if ($category) {
            $transactions->whereHas('product', function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        }

        // Filter by specific date if provided
        if ($date) {
            $transactions->whereDate('date', $date);
        }

        // Ambil transaksi yang tidak berstatus Pending atau Ditolak
        $transactions = $transactions->whereNotIn('status', ['Pending', 'Ditolak'])->get();

        // Passing the transactions, type, category, and date filters to the view
        return view('manajergudang.report.transaction', compact('transactions', 'type', 'category', 'date'));
    }
}
