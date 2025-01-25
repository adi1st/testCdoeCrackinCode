@extends('layouts.main')

@section('content')

    <div class="justify-between flex">
        <div class="">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>Dashboard</li>
                    <li>Supplier</li>
                </ul>
            </div>
            <h1 class="text-2xl font-bold" id="title">List Supplier</h1>
        </div>
        <a href="/supplier/create"
            class="btn bg-yellow-600 hover:bg-yellow-500 mb-6 lg:mb-6 text-white rounded-lg shadow-lg border-none">Tambah</a>
    </div>

    <div class="overflow-x-auto mt-8">
        <table class="table table-zebra mb-5">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Supplier</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if ($suppliers->count() > 0)
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $supplier->nama }}</td>
                            <td>+62 {{ $supplier->kontak }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>
                                <div class="flex space-x-2">
                                    <button class="btn btn-sm btn-success"
                                        onclick="detailModal(
                                        '{{ $supplier->id }}',
                                        '{{ $supplier->nama }}',
                                        '{{ $supplier->kontak }}',
                                        '{{ $supplier->alamat }}',
                                        '{{ $supplier->kategoris->implode('nama', ', ') }}',
                                        )">Detail</button>
                                    <a href="/supplier/{{ $supplier->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="/supplier/{{ $supplier->id }}" method="post" class="d-inline">
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
        {{ $suppliers->links() }}
    </div>

    <dialog id="detailModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="text-2xl font-bold">Detail Supplier</h3>

            <div class="mt-5">
                <div class="form-control">
                    <div class="mb-2">
                        <span class="label-text">Nama Supplier</span>
                        <h1 id="mdNama" class="text-lg font-bold"></h1>
                    </div>
                    <div class="mb-2">
                        <span class="label-text">Kontak</span>
                        <h1 id="mdKontak" class="text-lg font-bold"></h1>
                    </div>
                    <div class="mb-2">
                        <span class="label-text">Alamat</span>
                        <h1 id="mdAlamat" class="text-lg font-bold"></h1>
                    </div>
                    <div class="mb-2">
                        <span class="label-text">Kategori Produk</span>
                        <h1 id="mdKategori" class="text-lg font-bold"></h1>
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
        function detailModal(id, nama, kontak, alamat, kategori) {
            document.getElementById('mdNama').innerText = nama;
            document.getElementById('mdKontak').innerText = kontak;
            document.getElementById('mdAlamat').innerText = alamat;
            document.getElementById('mdKategori').innerText = kategori;
            document.getElementById('editLink').href = `/supplier/${id}/edit`;

            document.getElementById('detailModal').showModal();
        }
    </script>
@endsection
