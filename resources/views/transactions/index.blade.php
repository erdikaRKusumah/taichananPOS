@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>

<a href="{{ route('transactions.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Transaksi Baru</a>

{{-- Pilih jumlah data --}}
<form method="GET" class="mb-4">
    <label>Tampilkan:</label>
    <select name="perPage" onchange="this.form.submit()" class="border p-1 rounded">
        <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
    </select> data
</form>

<table class="table-auto w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Total</th>
            <th class="px-4 py-2">Item</th>
            <th class="px-4 py-2">Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $transaction->id }}</td>
            <td class="px-4 py-2">Rp {{ number_format($transaction->total,0,',','.') }}</td>
            <td class="px-4 py-2">
                @foreach($transaction->items as $item)
                    {{ $item->product->name }} ({{ $item->quantity }})<br>
                @endforeach
            </td>
            <td class="px-4 py-2">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
<div class="mt-4">
    {{ $transactions->links() }}
</div>
@endsection
