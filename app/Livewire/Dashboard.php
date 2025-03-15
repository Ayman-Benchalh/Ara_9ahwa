<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Produit;
use App\Models\Table;
use App\Models\Commande;
class Dashboard extends Component
{
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }

    // public function render()
    // {
    //     return view('livewire.admin.dashboard')->layout('layouts.dashboard');
    // }
    public function render()
    {
        // $produits = Produit::all()->groupBy('category');
        $produits = Produit::with(['categorie', 'produitImages'])->get()->groupBy('categorie_id')->values();
        // dd( $produits);
        $totalCommandes = Commande::count();
        $totalRevenue = Commande::sum('total_prix');
        $tables = Table::count();

        return view('livewire.admin.dashboard', [

            'produits' => $produits,
            'totalCommandes' => $totalCommandes,
            'totalRevenue' => $totalRevenue,
            'tables' => $tables,
        ])->layout('layouts.dashboard');
    }
}
