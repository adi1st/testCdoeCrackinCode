@extends('layouts.main')

@section('content')

    <div class="justify-between flex">
        <div class="">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>Dashboard</li>
                    <li>Produk</li>
                </ul>
            </div>
            <h1 class="text-2xl font-bold" id="title">List Produk</h1>
        </div>
        <a href="/produk/create"
            class="btn bg-yellow-600 hover:bg-yellow-500 mb-6 lg:mb-6 text-white rounded-lg shadow-lg border-none">Tambah</a>
    </div>

    <div class="overflow-x-auto mt-8">
        <table class="table table-zebra mb-5">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if ($produks->count() > 0)
                    @foreach ($produks as $produk)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>Rp {{ $produk->harga }}</td>
                            <td>
                                <div class="flex space-x-2">
                                    <a href="/produk/{{ $produk->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="/produk/{{ $produk->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">
                            <h1 class="text-2xl font-bold">Tidak ada data.</h1>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
        {{ $produks->links() }}
    </div>
@endsection
