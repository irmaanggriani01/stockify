<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role != 'Staff Gudang') {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $incomingTransactions = StockTransaction::with('product')
            ->where('type', 'masuk') // Barang masuk
            ->where('status', 'pending')
            ->get();

        $outgoingTransactions = StockTransaction::with('product')
            ->where('type', 'keluar') // Barang keluar
            ->where('status', 'pending')
            ->get();

        return view('staffgudang.stock.index', compact('incomingTransactions', 'outgoingTransactions'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Cari transaksi berdasarkan ID
        $transaction = StockTransaction::findOrFail($id);
        $oldStatus = $transaction->status;  // Menyimpan status lama untuk pengecekan perubahan

        // Update status transaksi
        $transaction->update(['status' => $request->status]);

        // Jika status baru adalah "Diterima" dan status sebelumnya bukan "Diterima"
        if ($request->status == 'diterima' && $oldStatus != 'diterima') {
            // Tambahkan stok produk
            $product = Product::find($transaction->product_id);
            $product->update([
                'stock_recorded' => $product->stock_recorded + $transaction->quantity,
            ]);
        }
        // Jika status baru adalah "Ditolak" dan status sebelumnya bukan "Ditolak"
        elseif ($request->status == 'ditolak' && $oldStatus != 'ditolak') {
            // Jangan menambah stok, cukup update statusnya saja
        }

        return redirect()->route('staffgudang.stock.index')->with('success', 'Status berhasil diperbarui.');
    }


    public function markAsChecked($id)
    {
        $transaction = StockTransaction::findOrFail($id);

        // Tandai transaksi sebagai diperiksa
        $transaction->update(['is_checked' => true]);

        return redirect()->back()->with('success', 'Transaksi berhasil diperiksa.');
    }
}
