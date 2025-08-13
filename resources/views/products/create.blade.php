@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ isset($product) ? 'Edit' : 'Tambah' }} Produk</h1>

<form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST" class="space-y-4">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <div>
        <label class="block mb-1">Nama Produk</label>
        <input type="text" name="name" value="{{ $product->name ?? '' }}" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block mb-1">Harga</label>
        <input type="number" name="price" value="{{ $product->price ?? '' }}" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block mb-1">Stok Awal</label>
        <input type="number" name="stock" value="{{ $product->stock ?? '' }}" class="border p-2 w-full" required>
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">{{ isset($product) ? 'Update' : 'Simpan' }}</button>
</form>
@endsection
