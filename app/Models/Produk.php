<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    protected $table   = 'produks';
    protected $guarded = ['id'];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['kategori'] ?? false, fn($query, $kategori) => $query->where('kategori_id', $kategori));
        $query->when($filters['supplier'] ?? false, fn($query, $supplier) => $query->where('supplier_id', $supplier));
    }
}
