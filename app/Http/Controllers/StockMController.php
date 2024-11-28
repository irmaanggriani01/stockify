<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockMController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role != 'Manajer Gudang') {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    // Tampilkan halaman manajemen stok
    // Menampilkan transaksi pada halaman stok index
    public function index()
    {
        // Ambil semua produk
        $products = Product::all();

        // Ambil transaksi yang statusnya 'Pending'
        $transactions = StockTransaction::where('status', 'Pending')->get();

        // Menentukan batas minimum stok untuk peringatan
        $stockWarnings = [];

        foreach ($products as $product) {
            if ($product->stock_recorded <= 10) {  // Misalnya stok < 10 akan memunculkan peringatan
                $stockWarnings[] = "Stok rendah untuk produk: {$product->name}. Sisa stok: {$product->stock_recorded}.";
            }
        }

        return view('manajergudang.stock.index', compact('products', 'transactions', 'stockWarnings'));
    }



    // Transaksi Barang Masuk
    public function barangMasuk()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('manajergudang.stock.barang_masuk', compact('products', 'suppliers'));
    }

    public function storeBarangMasuk(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
        ]);

        StockTransaction::create([
            'product_id' => $request->product_id,
            'supplier_id' => $request->supplier_id,
            'user_id' => auth()->id(),
            'type' => 'Masuk',
            'quantity' => $request->quantity,
            'date' => now(),
            'status' => 'Pending', // Status awal adalah Pending
            'notes' => $request->notes,
        ]);

        return redirect()->route('manajergudang.stock.index')->with('success', 'Transaksi barang masuk berhasil disimpan dan statusnya Pending.');
    }

    public function storeBarangKeluar(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        StockTransaction::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'type' => 'Keluar',
            'quantity' => $request->quantity,
            'date' => now(),
            'status' => 'Pending', // Status awal adalah Pending
            'notes' => $request->notes,
        ]);

        return redirect()->route('manajergudang.stock.index')->with('success', 'Transaksi barang keluar berhasil disimpan dan statusnya Pending.');
    }


    // Transaksi Barang Keluar
    public function barangKeluar()
    {
        $products = Product::all();
        return view('manajergudang.stock.barang_keluar', compact('products'));
    }


    // Stock Opname
    public function stockOpname()
    {
        $products = Product::all();

        // Ambil semua transaksi stok (Masuk dan Keluar) dengan status selain 'Pending' dan 'Ditolak'
        $stock_transactions = StockTransaction::select('product_id', DB::raw("
        SUM(CASE WHEN type = 'Masuk' AND status NOT IN ('Pending', 'Ditolak') THEN quantity ELSE 0 END) AS total_masuk,
        SUM(CASE WHEN type = 'Keluar' AND status NOT IN ('Pending', 'Ditolak') THEN quantity ELSE 0 END) AS total_keluar
    "))
            ->groupBy('product_id')
            ->get();

        // Gabungkan dengan data produk
        foreach ($products as $product) {
            $transaction = $stock_transactions->firstWhere('product_id', $product->id);
            $product->stock_calculated = ($transaction->total_masuk ?? 0) - ($transaction->total_keluar ?? 0);
        }

        return view('manajergudang.stock.stock_opname', compact('products', 'stock_transactions'));
    }

    public function storeStockOpname(Request $request)
    {
        foreach ($request->products as $productId => $data) {
            $product = Product::find($productId);

            // Validasi stok fisik
            if (!isset($data['stock_fisik']) || $data['stock_fisik'] < 0) {
                return redirect()->back()->with('error', 'Stok fisik tidak valid.');
            }

            // Update stok tercatat
            $product->update([
                'stock_recorded' => $data['stock_fisik'],
            ]);
        }

        return redirect()->route('manajergudang.stock.index')->with('success', 'Stock opname berhasil disimpan.');
    }

    // Di dalam StockMController
    public function daftarTransaksiDikonfirmasi()
    {
        // Ambil transaksi dengan status 'diterima' atau 'dikeluarkan'
        $transactions = StockTransaction::with('product')
            ->whereIn('status', ['diterima', 'dikeluarkan'])
            ->get();

        return view('manajergudang.stock.konfirmasi', compact('transactions'));
    }
}
