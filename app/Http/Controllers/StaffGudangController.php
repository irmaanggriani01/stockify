<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\StockTransaction;

class StaffGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.staffgudang');
    }

    public function dashboard()
    {
        $settings = Setting::first();
        
        $incomingTasks = StockTransaction::with('product')
            ->where('type', 'masuk')
            ->where('is_checked', false)
            ->get();

        $outgoingTasks = StockTransaction::with('product')
            ->where('type', 'keluar')
            ->where('is_checked', false)
            ->get();

        return view('staffgudang.dashboard.index', compact('settings', 'incomingTasks', 'outgoingTasks'));
    }

    public function utama()
    {
        return view('staffgudang.stock.index');
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
