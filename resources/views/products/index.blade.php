@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

<a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Produk</a>

<table class="table-auto w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Nama Produk</th>
            <th class="px-4 py-2">Harga</th>
            <th class="px-4 py-2">Stok</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $product->name }}</td>
            <td class="px-4 py-2">Rp {{ number_format($product->price,0,',','.') }}</td>
            <td class="px-4 py-2">{{ $product->stock }}</td>
            <td class="px-4 py-2">
                {{-- Hapus --}}
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection
