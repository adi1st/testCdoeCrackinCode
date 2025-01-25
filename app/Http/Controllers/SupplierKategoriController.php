<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class SupplierKategoriController extends Controller
{
    public function getKategori(Request $request)
    {
        $kategori = Kategori::whereHas('suppliers', function ($query) use ($request) {
            $query->where('suppliers.id', $request->supplier_id);
        })->get();

        return response()->json($kategori);
    }
}
