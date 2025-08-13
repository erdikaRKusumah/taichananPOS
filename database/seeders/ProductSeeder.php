<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sate Taichan',
            'price' => 15000,
            'stock' => 50
        ]);

        Product::create([
            'name' => 'Mie Instan',
            'price' => 7000,
            'stock' => 100
        ]);

        Product::create([
            'name' => 'Teh Manis Dingin',
            'price' => 5000,
            'stock' => 80
        ]);

        Product::create([
            'name' => 'Kopi Sachet Panas',
            'price' => 6000,
            'stock' => 60
        ]);
    }
}
