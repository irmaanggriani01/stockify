<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class StockTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'user_id', 'type', 'quantity', 'date', 'status', 'notes', 'is_checked', 'stock_recorded'
    ];

    protected $casts = [
        'date' => 'datetime', // Automatically cast date to Carbon instance
    ];

    // Override the 'date' attribute to ensure it's always in the Asia/Jakarta timezone
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
