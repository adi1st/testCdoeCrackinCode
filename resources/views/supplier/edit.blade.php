@extends('layouts.main')

@section('content')
    <div class="breadcrumbs text-sm">
        <ul>
            <li>Dashboard</li>
            <li><a href="/supplier">Supplier</a></li>
            <li>Update</li>
        </ul>
    </div>
    <div class="justify-between flex">
        <h1 class="text-2xl font-bold" id="title">Update Supplier</h1>
    </div>

    <div class="mt-8">
        <form action="/supplier/{{ $supplier->id }}" method="post">
            @method('put')
            @csrf
            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Nama</span>
                </div>
                <input name="nama" value="{{ old('nama', $supplier->nama) }}" type="text"
                    placeholder="Masukkan nama supplier"
                    class="input input-bordered w-full max-w-xs @error('nama') is-invalid @enderror" required />
                @error('nama')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Kontak</span>
                </div>
                <div
                    class="flex items-center gap-2 input input-bordered w-full max-w-xs @error('kontak') is-invalid @enderror">
                    +62
                    <input name="kontak" value="{{ old('kontak', $supplier->kontak) }}" type="number"
                        placeholder="89xxxxxxxxxx" class="grow" required />
                </div>
                @error('kontak')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <label for="" class="form-control">
                <div class="label">
                    <span class="label-text">Alamat</span>
                </div>
                <textarea name="alamat" class="textarea textarea-bordered @error('alamat') is-invalid @enderror"
                    placeholder="Masukkan alamat supplier" required>{{ old('alamat', $supplier->alamat) }}</textarea>
                @error('alamat')
                    <div class="label">
                        <span class="label-text-alt">{{ $message }}</span>
                    </div>
                @enderror
            </label>

            <div class="my-3">
                <h1>Kategori produk supplier</h1>
                <ul id="kategori-list" class="mt-2">
                    @if (count($supplier->kategoris) == 0)
                        <li class="mb-2 kategori-item">
                            <select name="kategori_id[]" class="select select-bordered w-full max-w-xs">
                                <option disabled selected>Pilih kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </li>
                    @else
                        @foreach ($supplier->kategoris as $ktg)
                            <li class="mb-2 kategori-item">
                                <select name="kategori_id[]" class="select select-bordered w-full max-w-xs">
                                    <option disabled selected>Pilih kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $ktg->id == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-error ms-1 hapus-kategori">Hapus</button>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <a class="btn btn-xs" id="tambah-kategori">+ Tambah</a>
            </div>

            <div class="flex
                    space-x-1">
                <a href="{{ route('supplier.index') }}" class="btn mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        const tambahKategoriBtn = document.querySelector('#tambah-kategori');
        const katOptions = `<option disabled selected>Pilih kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach`;
        tambahKategoriBtn.addEventListener("click", function() {
            const liBaru = document.createElement('li');
            liBaru.classList.add("mb-2", "kategori-item");

            // select
            const selectBaru = document.createElement('select');
            selectBaru.name = "kategori_id[]";
            selectBaru.classList.add("select", "select-bordered", "w-full", "max-w-xs");
            selectBaru.innerHTML = katOptions;
            // selectBaru.innerHTML = document.querySelector("select[name='kategori_id[]']").innerHTML;

            // delete button
            const hapusBtn = document.createElement('button');
            hapusBtn.type = "button";
            hapusBtn.textContent = "Hapus";
            hapusBtn.classList.add("btn", "btn-error", "ms-2", "hapus-kategori");

            hapusBtn.addEventListener("click", function() {
                liBaru.remove();
            });

            liBaru.appendChild(selectBaru);
            liBaru.appendChild(hapusBtn);

            const ul = document.querySelector('#kategori-list');
            ul.appendChild(liBaru);
        });

        document.querySelectorAll(".hapus-kategori").forEach(btn => {
            btn.addEventListener("click", function() {
                this.parentElement.remove();
            });
        });
    </script>
@endsection
