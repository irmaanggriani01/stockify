<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Activity;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Imports\ProductImport;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth'); // Pastikan pengguna harus login
    }

    public function utama()
    {
        return view('admin.product.utama');
    }

    // Menampilkan halaman dashboard admin
    public function index()
    {
        return view('layouts.admin'); // Pastikan halaman yang benar dirender
    }

    // Menampilkan halaman dashboard dengan pengaturan aplikasi
    public function dashboard()
    {
        $settings = Setting::first();
        $transactionsInCount = StockTransaction::where('type', 'masuk')->count();
        $transactionsOutCount = StockTransaction::where('type', 'keluar')->count();
        $productsCount = Product::count();

        // Ambil 5 aktivitas terbaru dari tabel activities
        $latestActivities = Activity::with('user')->orderBy('created_at', 'desc')->take(5)->get();

        if (Schema::hasTable('categories') && Schema::hasTable('products')) {
            $categories = DB::table('categories')
                ->join('products', 'categories.id', '=', 'products.category_id')
                ->select('categories.name')
                ->distinct()
                ->pluck('name');

            $productCounts = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select('categories.name as category', DB::raw('count(products.id) as total'))
                ->groupBy('categories.name')
                ->pluck('total', 'category');
        } else {
            $categories = collect([]);
            $productCounts = collect([]);
        }

        return view('admin.dashboard.index', compact(
            'settings',
            'productsCount',
            'transactionsInCount',
            'transactionsOutCount',
            'latestActivities',
            'categories',
            'productCounts'
        ));
    }

    // Menampilkan halaman pengaturan aplikasi
    public function showSettings()
    {
        // Mengambil pengaturan aplikasi dari database
        $settings = Setting::first();

        // Periksa apakah pengaturan ada sebelum merender view
        if (!$settings) {
            return redirect()->back()->with('error', 'Pengaturan tidak ditemukan.');
        }

        return view('settings', compact('settings'));
    }

    public function indexProduct()
    {
        $products = Product::with(['kategori', 'supplier'])->paginate(3);

        // Format harga
        foreach ($products as $product) {
            $product->formatted_purchase_price = 'Rp' . number_format($product->purchase_price, 0, ',', '.');
            $product->formatted_selling_price = 'Rp' . number_format($product->selling_price, 0, ',', '.');
        }
    
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Kategori::all();
        $suppliers = Supplier::all();
        return view('admin.product.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'description' => 'required|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar di storage
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;

        Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'supplier_id' => $request->supplier_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Kategori::all();
        $suppliers = Supplier::all();
        return view('admin.product.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($validatedData);
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    // Fungsi untuk Impor Data
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new ProductImport, $request->file('file'));

        return redirect()->route('admin.product.index')->with('success', 'Data produk berhasil diimpor!');
    }
}
