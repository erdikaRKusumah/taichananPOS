@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>

<div>
    <div>Total Transaksi Hari Ini: {{ $totalTransaksi }}</div>
    <div>Total Pendapatan Hari Ini: Rp {{ number_format($totalPendapatan,0,',','.') }}</div>
    <div>Produk Terlaris: {{ $produkTerlaris?->product->name ?? 'Belum ada' }} ({{ $produkTerlaris?->total_qty ?? 0 }} pcs)</div>
</div>

<a href="{{ route('transactions.create') }}">
    <button>Transaksi Baru</button>
</a>

{{-- Opsional: nanti bisa tambah grafik --}}
@endsection
