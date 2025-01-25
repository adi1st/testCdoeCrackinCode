<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk.index', [
            'produks' => Produk::latest()->filter(request(['kategori', 'supplier']))->paginate(10)->withQueryString(),
            'filters' => Produk::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', [
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required',
            'deskripsi'   => 'required|max:50',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|numeric',
            'kategori_id' => [
                'required',
                Rule::exists('kategori_suppliers', 'kategori_id')->where('supplier_id', $request->supplier_id),
            ],
            'supplier_id' => 'required|exists:suppliers,id',
        ]);
        // dd($validated);
        Produk::create($validated);
        return redirect('/produk')->with('success', 'Berhasil menambahkan produk.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'produk'    => $produk,
            'suppliers' => Supplier::all(),
            'kategoris' => Kategori::whereHas('suppliers', function ($query) use ($produk) {
                $query->where('supplier_id', $produk->supplier_id);
            })->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'nama'        => 'required',
            'deskripsi'   => 'required|max:50',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|numeric',
            'kategori_id' => [
                'required',
                Rule::exists('kategori_suppliers', 'kategori_id')->where('supplier_id', $request->supplier_id),
            ],
            'supplier_id' => 'required|exists:suppliers,id',
        ];

        $validated = $request->validate($rules);
        // dd($validated);
        $produk->update($validated);
        return redirect()->back()->with('success', 'Berhasil mengupdate produk.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect()->back()->with('success', 'Berhasil menghapus produk.');
    }
}
