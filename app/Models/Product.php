<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'sku', 'category_id', 'description', 
        'purchase_price', 'selling_price', 'supplier_id', 'image','stock_recorded',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function productAttribute()
    {
        return $this->hasOne(ProductAttribute::class);
    }
    
    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class);
    }
    
    // Mendapatkan total stok tercatat dari transaksi
    public function getTotalStockAttribute()
    {
        return $this->stockTransactions->sum('quantity');
    }
}

