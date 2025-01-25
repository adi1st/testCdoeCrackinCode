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
                                    <button class="btn btn-sm btn-success"
                                        onclick="detailModal(
                                    '{{ $produk->id }}',
                                    '{{ $produk->nama }}',
                                    '{{ $produk->deskripsi }}',
                                    '{{ $produk->stok }}',
                                    '{{ $produk->harga }}',
                                    '{{ $produk->kategori->nama }}',
                                    '{{ $produk->supplier->nama }}'
                                    )">Detail</button>
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

    <dialog id="detailModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="text-2xl font-bold">Detail Produk</h3>

            <div class="mt-5">
                <div class="form-control">
                    <div class="mb-2">
                        <span class="label-text">Nama Produk</span>
                        <h1 id="mdNama" class="text-lg font-bold"></h1>
                    </div>
                    <div class="mb-2">
                        <span class="label-text">Deskripsi</span>
                        <h1 id="mdDeskripsi" class="text-lg font-bold"></h1>
                    </div>
                    <div class="mb-2">
                        <span class="label-text">Stok</span>
                        <h1 id="mdStok" class="text-lg font-bold"></h1>
                    </div>
                    <div class="mb-2">
                        <span class="label-text">Harga</span>
                        <h1 id="mdHarga" class="text-lg font-bold"></h1>
                    </div>
                    <div class="mb-2">
                        <span class="label-text">Kategori</span>
                        <h1 id="mdKategori" class="text-lg font-bold"></h1>
                    </div>
                    <div>
                        <span class="label-text">Supplier</span>
                        <h1 id="mdSupplier" class="text-lg font-bold"></h1>
                    </div>
                </div>
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <a id="editLink" class="btn btn-primary">Edit</a>
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>

    <script>
        function detailModal(id, nama, deskripsi, stok, harga, kategori, supplier) {
            document.getElementById('mdNama').innerText = nama;
            document.getElementById('mdDeskripsi').innerText = deskripsi;
            document.getElementById('mdStok').innerText = stok;
            document.getElementById('mdHarga').innerText = 'Rp ' + harga;
            document.getElementById('mdKategori').innerText = kategori;
            document.getElementById('mdSupplier').innerText = supplier;
            document.getElementById('editLink').href = `/produk/${id}/edit`;
            document.getElementById('detailModal').showModal();
        }
    </script>
@endsection
