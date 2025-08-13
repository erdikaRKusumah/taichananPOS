<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'subtotal'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // relasi ke transaction items
    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
