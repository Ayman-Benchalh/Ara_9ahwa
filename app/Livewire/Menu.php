<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit; // Model ta3 les produits
use App\Models\Table;

class Menu extends Component
{

    public $qr_code;

    // Mount method to capture the qr_code from the route
    public function mount($qr_code)
    {
        $this->qr_code = $qr_code;
    }
    public function render()
    {
        // On récupère les produits de la base de données
        // $produits = Produit::all();
        $produits = Produit::with(['categorie', 'produitImages'])->get();

        $tabel = Table::where('qr_code', $this->qr_code)->first();


        return view('livewire.menu', ['produits'=>$produits,'table'=>  $tabel])->layout('layouts.app');

    }
}
