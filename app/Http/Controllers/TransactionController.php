<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5); // default 5

        $transactions = Transaction::with('items.product')
                    ->orderByDesc('created_at')
                    ->paginate($perPage)
                    ->withQueryString();

        return view('transactions.index', compact('transactions', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil item dari form
        $items = $request->input('items', []);

        // Filter qty > 0
        $items = array_filter($items, function($qty) {
            return $qty > 0;
        });

        if (empty($items)) {
            return redirect()->back()->with('error', 'Tidak ada item yang dipilih');
        }

        // Hitung total
        $total = 0;
        foreach ($items as $productId => $qty) {
            $product = Product::findOrFail($productId);
            $total += $product->price * $qty;
        }

        // Simpan transaksi
        $transaction = Transaction::create([
            'total' => $total
        ]);

        // Simpan item transaksi
        foreach ($items as $productId => $qty) {
            $product = Product::findOrFail($productId);
            $transaction->items()->create([
                'product_id' => $productId,
                'quantity' => $qty,
                'price' => $product->price,
                'subtotal' => $product->price * $qty
            ]);

            // Kurangi stok
            $product->decrement('stock', $qty);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan');
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
