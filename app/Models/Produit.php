<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;
use App\Models\Categorie;
class Produit extends Model
{
    use HasFactory;
      protected $fillable = ['nom', 'prix', 'categorie_id'];

   
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produit')
                    ->withPivot('quantite')
                    ->withTimestamps();
    }



    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function produitImages()
    {
        return $this->hasMany(ProduitImage::class, 'produit_id');
    }
}
