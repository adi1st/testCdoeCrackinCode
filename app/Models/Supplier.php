<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supplier extends Model
{
    protected $table   = 'suppliers';
    protected $guarded = ['id'];

    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_suppliers', 'supplier_id', 'kategori_id');
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            $query->whereHas('kategoris', function ($q) use ($kategori) {
                $q->where('kategori_id', $kategori);
            });
        });
    }
}
