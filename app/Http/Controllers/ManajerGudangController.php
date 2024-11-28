<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting; 
use App\Models\Supplier;
use App\Models\Product;
use App\Models\StockTransaction;

class ManajerGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.manajergudang');
    }

    public function dashboard()
    {
        // Ambil pengaturan aplikasi
        $settings = Setting::first();
        
        // Ambil data ringkasan stok barang
        $stockLow = Product::where('stock_recorded', '<=', 10)->get(); // Menipis jika stok <= 5
        $productsInToday = stockTransaction::whereDate('created_at', today())
            ->where('type', 'masuk') // Barang masuk
            ->get();
        $productsOutToday = stockTransaction::whereDate('created_at', today())
            ->where('type', 'keluar') // Barang keluar
            ->get();
        
        return view('manajergudang.dashboard.index', compact('settings', 'stockLow', 'productsInToday', 'productsOutToday'));
    }

    public function supplier()
    {
        $suppliers = Supplier::all(); // Ambil semua data supplier
        return view('manajergudang.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
