<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('supplier.index', [
            'suppliers' => Supplier::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create', [
            'kategoris' => Kategori::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|max:75|min:2',
            'kontak'        => 'required|numeric|digits_between:11,13',
            'alamat'        => 'required|max:255',
            'kategori_id'   => 'array',
            'kategori_id.*' => 'exists:kategoris,id',
        ]);

        // dd($validated);

        $supplier = Supplier::create($validated);
        $supplier->kategoris()->attach(array_unique($validated['kategori_id']));

        return redirect('/supplier')->with('success', 'Berhasi menambahkan supplier.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', [
            'supplier'  => $supplier,
            'kategoris' => Kategori::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'nama'          => 'required|max:75|min:2',
            'kontak'        => 'required|numeric|digits_between:11,13',
            'alamat'        => 'required|max:255',
            'kategori_id'   => 'array',
            'kategori_id.*' => 'exists:kategoris,id',
        ];

        $validated = $request->validate($rules);
        $supplier->update(Arr::except($validated, ['kategori_id']));
        $supplier->kategoris()->sync($request->kategori_id ?? []);

        return redirect()->back()->with('success', 'Berhasil mengupdate supplier.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::destroy($supplier->id);
        return redirect()->back()->with('success', 'Berhasil menghapus supplier.');
    }
}
