@extends('layouts.main')

@section('content')
    <div class="justify-between flex">
        <div class="">
            <div class="breadcrumbs text-sm">
                <ul>
                    <li>Dashboard</li>
                    <li>Kategori</li>
                </ul>
            </div>
            <h1 class="text-2xl font-bold" id="title">List Kategori</h1>
        </div>
        <a href="/kategori/create"
            class="btn bg-yellow-600 hover:bg-yellow-500 mb-6 lg:mb-6 text-white rounded-lg shadow-lg border-none">Tambah</a>
    </div>

    <div class="overflow-x-auto mt-8">
        <table class="table table-zebra mb-5">
            <!-- head -->
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if ($kategoris->count() > 0)
                    @foreach ($kategoris as $kategori)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $kategori->nama }}</td>
                            <td>{{ $kategori->deskripsi }}</td>
                            <td>
                                <div class="flex space-x-2 justify-end">
                                    <button class="btn btn-sm btn-success"
                                        onclick="detailModal('{{ $kategori->id }}','{{ $kategori->nama }}','{{ $kategori->deskripsi }}')">Detail</button>
                                    <a href="/kategori/{{ $kategori->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="/kategori/{{ $kategori->id }}" method="post" class="d-inline">
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
        {{ $kategoris->links() }}
    </div>

    <dialog id="detailModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="text-2xl font-bold">Detail Kategori</h3>

            <div class="mt-5">
                <div class="form-control">
                    <div class="mb-2">
                        <span class="label-text">Nama Kategori</span>
                        <h1 id="mdNama" class="text-lg font-bold"></h1>
                    </div>
                    <div class="">
                        <span class="label-text">Deskripsi</span>
                        <h1 id="mdDeskripsi" class="text-lg font-bold"></h1>
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
        function detailModal(id, nama, deskripsi) {
            document.getElementById('mdNama').innerText = nama;
            document.getElementById('mdDeskripsi').innerText = deskripsi;
            document.getElementById('editLink').href = `/kategori/${id}/edit`;
            document.getElementById('detailModal').showModal();
        }
    </script>
@endsection
