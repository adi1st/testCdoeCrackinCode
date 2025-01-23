<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategori extends Model
{
    protected $table   = 'kategoris';
    protected $guarded = ['id'];

    public function suppliers(): BelongsToMany
    {
        return $this->belongsToMany(Supplier::class, 'kategori_suppliers', 'id_kategori', 'id_supplier');
    }
}
