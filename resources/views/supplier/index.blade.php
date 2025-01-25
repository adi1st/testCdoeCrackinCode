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
@endsection
