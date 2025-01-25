<?php
namespace App\Models;

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
}
