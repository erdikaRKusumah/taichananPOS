@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Transaksi Baru</h1>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <table class="table-auto w-full border border-gray-300 mb-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Produk</th>
                <th class="px-4 py-2">Harga</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $product->name }}</td>
                <td class="px-4 py-2">Rp {{ number_format($product->price,0,',','.') }}</td>
                <td class="px-4 py-2">{{ $product->stock }}</td>
                <td class="px-4 py-2">
                    <input type="number" name="qty[{{ $product->id }}]" value="0" min="0" max="{{ $product->stock }}" class="border p-1 w-20">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan Transaksi</button>
</form>
@endsection
