<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'stock'];

    public function items()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }
    

}
