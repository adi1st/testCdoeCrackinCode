@extends('layouts.main')

@section('content')
    <div class="breadcrumbs text-sm">
        <ul>
            <li>Dashboard</li>
            <li><a href="/produk">Produk</a></li>
            <li>Update</li>
        </ul>
    </div>
    <div class="justify-between flex">
        <h1 class="text-2xl font-bold" id="title">Update Produk</h1>
    </div>

    <div class="mt-8">
        <form action="/produk/{{ $produk->id }}" method="post">
            @method('put')
            @csrf

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Supplier</span>
                </div>
                <select name="supplier_id" id="supplier" class="select select-bordered w-full max-w-xs">
                    <option disabled selected>Pilih supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id == $produk->supplier_id ? 'selected' : '' }}>
                            {{ $supplier->nama }}
                        </option>
                    @endforeach
                </select>
                @error('supplier')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Kategori Produk</span>
                </div>
                <select name="kategori_id" id="kategori" class="select select-bordered w-full max-w-xs">
                    <option disabled>Pilih kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id == $produk->kategori_id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Nama</span>
                </div>
                <input name="nama" value="{{ old('nama', $produk->nama) }}" type="text"
                    placeholder="Masukkan nama produk"
                    class="input input-bordered w-full max-w-xs @error('nama') is-invalid @enderror" required />
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
                <textarea name="deskripsi" class="textarea textarea-bordered @error('deskripsi') is-invalid @enderror"
                    placeholder="Masukkan deskripsi produk" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Harga</span>
                </div>
                <div
                    class="flex items-center gap-2 input input-bordered w-full max-w-xs @error('harga') is-invalid @enderror">
                    Rp
                    <input name="harga" value="{{ old('harga', $produk->harga) }}" type="text"
                        placeholder="Masukkan harga produk" class="grow" required />
                </div>
                @error('harga')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Stok Produk</span>
                </div>
                <div
                    class="flex items-center gap-2 input input-bordered w-full max-w-xs @error('stok') is-invalid @enderror">
                    Total
                    <input name="stok" value="{{ old('stok', $produk->stok) }}" type="text"
                        placeholder="Masukkan stok produk" class="grow" required />
                </div>
                @error('stok')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <div class="flex
                    space-x-1">
                <a href="{{ route('produk.index') }}" class="btn mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("supplier").addEventListener("change", function() {
            let supplierId = this.value;
            let kategoriDropdown = document.getElementById("kategori");
            kategoriDropdown.innerHTML = '<option disabled selected>Loading...</option>';

            fetch(`/get-kategori?supplier_id=${supplierId}`)
                .then(response => response.json())
                .then(data => {
                    kategoriDropdown.innerHTML = '<option disabled selected>Pilih kategori</option>';
                    data.forEach(kategori => {
                        let option = document.createElement('option');
                        option.value = kategori.id;
                        option.textContent = kategori.nama;
                        kategoriDropdown.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        })
    </script>
@endsection
