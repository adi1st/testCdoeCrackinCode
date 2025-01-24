@extends('layouts.main')

@section('content')
    <div class="breadcrumbs text-sm">
        <ul>
            <li>Dashboard</li>
            <li><a href="/kategori">Kategori</a></li>
            <li>Edit</li>
        </ul>
    </div>
    <div class="justify-between flex">
        <h1 class="text-2xl font-bold" id="title">Edit Kategori</h1>
    </div>

    <div class="mt-8">
        <form action="/kategori/{{ $kategori->id }}" method="post">
            @method('put')
            @csrf
            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Nama Kategori</span>
                </div>
                <input name="nama" value="{{ old('nama', $kategori->nama) }}" type="text"
                    placeholder="Masukkan nama kategoori"
                    class="input input-bordered w-full max-w-xs @error('nama') is-invalid @enderror" />
                @error('nama')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Deskripsi</span>
                </div>
                <textarea name="deskripsi" class="textarea textarea-bordered @error('nama') is-invalid @enderror"
                    placeholder="Masukkan deskripsi kategori">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <div class="flex
                    space-x-1">
                <a href="{{ route('kategori.index') }}" class="btn mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Simpan</button>
            </div>
        </form>
    </div>
@endsection
