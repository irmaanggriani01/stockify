<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AdminController,
    StaffGudangController,
    ManajerGudangController,
    ProductController,
    StockTransactionController,
    SupplierController,
    UserController,
    SettingController,
    ProductAttributeController,
    ProductMController,
    StockMController,
    StockSController,
    ReportController,
    ReportMController,
    KategoriController
};
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

// Redirect root to the login page
Route::get('/', fn() => redirect()->route('login'));

// Login and logout routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route group for Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/product/utama', [AdminController::class, 'utama'])->name('product.utama');
    Route::get('/dashboard/index', [AdminController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/product', [AdminController::class, 'indexProduct'])->name('product.index');
    Route::get('/product/create', [AdminController::class, 'create'])->name('product.create');
    Route::post('/product', [AdminController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [AdminController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [AdminController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [AdminController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/export', function () {
        return Excel::download(new ProductExport, 'products.xlsx');
    })->name('product.export');

    Route::post('/product/import', function () {
        Excel::import(new ProductImport, request()->file('file'));
        return back()->with('success', 'Data produk berhasil diimpor.');
    })->name('product.import');

    Route::get('/product/attribute', [ProductController::class, 'index'])->name('product.attribute.index');
    Route::get('/product/attribute/create', [ProductController::class, 'create'])->name('product.attribute.create');
    Route::post('/product/attribute', [ProductController::class, 'store'])->name('product.attribute.store');
    Route::get('/product/attribute/{id}/edit', [ProductController::class, 'edit'])->name('product.attribute.edit');
    Route::put('/product/attribute/{id}', [ProductController::class, 'update'])->name('product.attribute.update');
    Route::delete('/product/attribute/{id}', [ProductController::class, 'destroy'])->name('product.attribute.destroy');
    Route::get('/stock/index', [StockTransactionController::class, 'index'])->name('stock.index');
    Route::get('/supplier/index', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/setting/index', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/report/index', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/stock', [ReportController::class, 'stockReport'])->name('report.stock');
    Route::get('/report/transaction', [ReportController::class, 'transactionReport'])->name('report.transaction');
    Route::get('/admin/report/user', [ReportController::class, 'userActivityReport'])->name('report.user');

    // Stock management routes
    Route::prefix('stock')->name('stock.')->group(function () {
        Route::get('/', [StockTransactionController::class, 'index'])->name('index');
        Route::get('/transactions', [StockTransactionController::class, 'transactions'])->name('transactions');
        Route::get('/stock_opname', [StockTransactionController::class, 'stockOpname'])->name('stock_opname');
        Route::get('/stock_minimum', [StockTransactionController::class, 'stokMinimum'])->name('stock_minimum');
        Route::post('/barang_masuk', [StockTransactionController::class, 'storeBarangMasuk'])->name('store_barang_masuk');
        Route::post('/barang_keluar', [StockTransactionController::class, 'storeBarangKeluar'])->name('store_barang_keluar');
        Route::post('/stock_opname', [StockTransactionController::class, 'storeStockOpname'])->name('store_stock_opname');
        Route::post('/stock_minimum', [StockTransactionController::class, 'storeStockMinimum'])->name('store_stock_minimum');
    });
});

// Route group for Manajer Gudang
Route::prefix('manajergudang')->name('manajergudang.')->middleware(['auth', 'role:Manajer Gudang'])->group(function () {
    Route::get('/dashboard/index', [ManajerGudangController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/product/index', [ProductMController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductMController::class, 'create'])->name('product.create');
    Route::get('/product/{id}/edit', [ProductMController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}/update', [ProductMController::class, 'update'])->name('product.update');
    Route::delete('product/{id}', [ProductMController::class, 'destroy'])->name('product.destroy');
    Route::get('/kategori/index', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/stock/index', [StockMController::class, 'index'])->name('stock.index');
    Route::put('/stock/update-status/{transactionId}', [StockMController::class, 'updateStatus'])->name('stock.updateStatus');
    Route::get('/supplier/index', [ManajerGudangController::class, 'supplier'])->name('supplier.index');
    Route::get('/report/index', [ReportMController::class, 'index'])->name('report.index');
    Route::get('/report/stock', [ReportMController::class, 'stockReport'])->name('report.stock');
    Route::get('/report/transaction', [ReportMController::class, 'transactionReport'])->name('report.transaction');
    Route::get('/report/user', [ReportMController::class, 'userActivityReport'])->name('report.user');
    Route::get('/stock/konfirmasi', [StockMController::class, 'daftarTransaksiDikonfirmasi'])->name('manajergudang.stock.konfirmasi');

    // Stock management for Manajer Gudang
    Route::prefix('stock')->name('stock.')->group(function () {
        Route::get('/barang-masuk', [StockMController::class, 'barangMasuk'])->name('barang_masuk');
        Route::post('/barang-masuk', [StockMController::class, 'storeBarangMasuk'])->name('store_barang_masuk');
        Route::get('/barang-keluar', action: [StockMController::class, 'barangKeluar'])->name('barang_keluar');
        Route::post('/barang-keluar', [StockMController::class, 'storeBarangKeluar'])->name('store_barang_keluar');
        Route::get('/stock-opname', [StockMController::class, 'stockOpname'])->name('stock_opname');
        Route::post('/stock-opname', [StockMController::class, 'storeStockOpname'])->name('store_stock_opname');
        Route::post('/konfirmasi', [StockMController::class, 'daftarTransaksiDikonfirmasi'])->name('konfirmasi');
        // Route::patch('/stock/update-status/{id}', [StockMController::class, 'updateStatus'])->name('manajergudang.stock.updateStatus');

    });
});

// Route group for Staff Gudang
Route::prefix('staffgudang')->name('staffgudang.')->middleware(['auth', 'role:Staff Gudang'])->group(function () {
    Route::get('/dashboard/index', [StaffGudangController::class, 'dashboard'])->name('dashboard.index');
    Route::get('/stok/index', [StockSController::class, 'index'])->name('staffgudang.stock.index');
    Route::post('/stok/confirm/{id}', [StockSController::class, 'confirm'])->name('staffgudang.stock.confirm');
});

// Product and Supplier Resource Routes
Route::resource('product', ProductController::class);
Route::resource('product', ProductMController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('user', UserController::class);
Route::resource('product.attribut', ProductAttributeController::class);

// General setting route
Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

Route::prefix('staffgudang/stock')->middleware(['auth', 'role:Staff Gudang'])->group(function () {
    Route::get('/stock', [StockSController::class, 'index'])->name('staffgudang.stock.index');
    Route::put('/stock/{id}/update-status', [StockSController::class, 'updateStatus'])->name('staffgudang.stock.updateStatus');
    Route::post('/stock/{id}/check', [StockSController::class, 'markAsChecked'])->name('stock.check');
});

