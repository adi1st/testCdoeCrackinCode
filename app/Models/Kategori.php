<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table   = 'kategoris';
    protected $guarded = ['id'];

    public function suppliers(): BelongsToMany
    {
        return $this->belongsToMany(Supplier::class, 'kategori_suppliers', 'kategori_id', 'supplier_id');
    }
}
