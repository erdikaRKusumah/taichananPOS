<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total transaksi hari ini
        $today = Carbon::today();
        $totalTransaksi = Transaction::whereDate('created_at', $today)->count();

        // 2. Total pendapatan hari ini
        $totalPendapatan = Transaction::whereDate('created_at', $today)->sum('total');

        // 3. Produk terlaris (qty terbanyak)
        $produkTerlaris = TransactionItem::select('product_id', DB::raw('SUM(quantity) as total_qty'))
                            ->groupBy('product_id')
                            ->orderByDesc('total_qty')
                            ->with('product')
                            ->first();

        return view('dashboard.index', compact(
            'totalTransaksi', 
            'totalPendapatan', 
            'produkTerlaris'
        ));
    }
}
