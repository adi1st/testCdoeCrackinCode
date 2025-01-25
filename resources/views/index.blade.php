@extends('layouts.main')

@section('content')
    <div class="breadcrumbs text-sm">
        <ul>
            <li>Dashboard</li>
        </ul>
    </div>
    <h1 class="text-2xl font-bold" id="title">Halaman Dashboard</h1>
    <div class="mt-5">
        <p>Hello. Selamat datang di halaman dashboard :)</p>
    </div>
    <div class="flex space-x-5 my-10">
        <div class="border-2 p-5 rounded-lg">
            <h1>Total Produk</h1>
            <h1 id="totalProduk" class="text-2xl font-bold">{{ $produk }} Produk</h1>
        </div>
        <div class="border-2 p-5 rounded-lg">
            <h1>Total Supplier</h1>
            <h1 id="totalProduk" class="text-2xl font-bold">{{ $supplier }} Supplier</h1>
        </div>
        <div class="border-2 p-5 rounded-lg">
            <h1>Total Kategori</h1>
            <h1 id="totalProduk" class="text-2xl font-bold">{{ $kategori }} Kategori</h1>
        </div>
    </div>
@endsection
