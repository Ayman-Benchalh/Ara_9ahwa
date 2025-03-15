<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit; // Model ta3 les produits

class Menu extends Component
{
    public function render()
    {
        // On récupère les produits de la base de données
        $produits = Produit::all();

        return view('livewire.menu', compact('produits'));
    }
}
