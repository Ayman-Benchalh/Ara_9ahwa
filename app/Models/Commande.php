<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = ['table_id', 'statut', 'total_prix'];

    // Relation : Une commande appartient à une table
    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    // Relation : Une commande contient plusieurs produits (via une table pivot)
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit')
                    ->withPivot('quantite')
                    ->withTimestamps();
    }
}
