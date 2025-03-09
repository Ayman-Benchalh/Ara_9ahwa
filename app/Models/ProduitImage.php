<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitImage extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'image_path'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
