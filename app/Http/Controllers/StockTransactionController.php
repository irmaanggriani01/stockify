<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    // Menampilkan halaman utama manajemen stok
    public function index()
    {
        // Ambil semua produk
        $products = Product::all();

        // Ambil role user yang sedang login
        $role = auth()->user()->role;

        // Array untuk menyimpan peringatan stok minimum
        $stockWarnings = [];

        // Cek setiap produk apakah stok tercatat sudah mencapai atau kurang dari stok minimum
        foreach ($products as $product) {
            if ($product->stock_recorded <= $product->stok_minimum) {
                $stockWarnings[] = "Peringatan: Stok untuk produk '{$product->name}' telah mencapai atau di bawah batas minimum ({$product->stok_minimum}).";
            }
        }

        // Tampilkan halaman dengan data produk dan peringatan stok minimum
        return view('admin.stock.index', compact('products', 'stockWarnings'));
    }


    // Menampilkan riwayat transaksi barang masuk dan keluar
    public function transactions()
    {
        // Ambil riwayat transaksi barang masuk dan keluar
        $transactions = StockTransaction::with('product')->orderBy('created_at', 'desc')->get();

        return view('admin.stock.transactions', compact('transactions'));
    }

    // Menampilkan halaman stock opname
    public function stockOpname()
    {
        $products = Product::all();

        // Ambil transaksi stok masuk dengan status 'approved'
        $stock_in_transactions = StockTransaction::where('type', 'Masuk')
            ->where('status', 'diterima') // Hanya yang disetujui
            ->get();

        // Ambil transaksi stok keluar dengan status 'approved'
        $stock_out_transactions = StockTransaction::where('type', 'Keluar')
            ->where('status', 'dikeluarkan') // Hanya yang disetujui
            ->get();

        // Kirimkan data transaksi ke view
        return view('admin.stock.stock_opname', compact('products', 'stock_in_transactions', 'stock_out_transactions'));
    }

    public function storeStockOpname(Request $request)
    {
        foreach ($request->products as $productId => $data) {
            $product = Product::find($productId);
            $product->update([
                'quantity' => $data['stock_fisik'],
            ]);
        }

        return redirect()->route('admin.stock.index')->with('success', 'Stock opname berhasil disimpan.');
    }

    // Menampilkan halaman pengaturan stok minimum
    public function stokMinimum()
    {
        // Ambil data produk untuk pengaturan stok minimum
        $products = Product::all();

        return view('admin.stock.minimum_stock', compact('products'));
    }

    // Menyimpan transaksi barang masuk
    public function storeBarangMasuk(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Simpan transaksi barang masuk
        StockTransaction::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'transaction_type' => 'masuk',
            'notes' => $request->notes,
        ]);

        // Tambahkan stok produk
        $product->stock_recorded += $request->quantity;
        $product->save();

        return redirect()->route('admin.stock.transactions')->with('success', 'Transaksi barang masuk berhasil');
    }

    // Menyimpan transaksi barang keluar
    public function storeBarangKeluar(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Validasi jika stok tidak cukup untuk keluar
        if ($product->stock_recorded < $request->quantity) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak mencukupi untuk barang keluar.']);
        }

        // Simpan transaksi barang keluar
        StockTransaction::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'transaction_type' => 'keluar',
            'notes' => $request->notes,
        ]);

        // Kurangi stok produk
        $product->stock_recorded -= $request->quantity;
        $product->save();

        return redirect()->route('admin.stock.transactions')->with('success', 'Transaksi barang keluar berhasil');
    }

    // Menyimpan data stock opname


    // Menyimpan pengaturan stok minimum
    public function storeStockMinimum(Request $request)
    {
        // Validasi data input
        $request->validate([
            'products.*.stok_minimum' => 'required|integer|min:0', // Validasi stok_minimum
        ]);

        // Mendapatkan data produk dan stok minimum
        $data = $request->input('products');

        // Loop untuk menyimpan stok minimum per produk
        foreach ($data as $productId => $values) {
            $product = Product::findOrFail($productId);
            $product->stok_minimum = $values['stok_minimum'];
            $product->save();
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.stock.index')->with('success', 'Pengaturan stok minimum berhasil disimpan.');
    }

    public function checkStock(StockTransaction $transaction)
    {
        // Mark the transaction as completed
        $transaction->update(['is_checked' => true]);

        // Redirect back with a success message
        return redirect()->route('staffgudang.dashboard.index')
            ->with('success', 'Tugas berhasil diselesaikan.');
    }
}
