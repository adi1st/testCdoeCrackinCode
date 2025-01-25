<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'kategoris' => Kategori::latest()->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|unique:kategoris,nama',
            'deskripsi' => 'required|max:50',
        ]);

        Kategori::create($validated);
        return redirect('/kategori')->with('success', 'Berhasil menambahkan kategori.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'deskripsi' => 'required|max:50',
        ];

        if ($request->nama != $kategori->nama) {
            $rules['nama'] = 'required|unique:kategoris,nama';
        }
        $validated = $request->validate($rules);
        Kategori::where('id', $kategori->id)->update($validated);
        return redirect()->back()->with('success', 'Berhasil mengupdata kategori.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect()->back()->with('success', 'Berhasil menghapus kategori');
    }
}
