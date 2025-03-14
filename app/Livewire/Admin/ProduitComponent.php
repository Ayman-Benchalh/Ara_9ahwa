<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\ProduitImage;

use Illuminate\Support\Facades\Storage;


class ProduitComponent extends Component
{
    use WithFileUploads;

    public $nom, $prix, $category_id, $images = [];
    public $produit_id, $existingImages = [];
    public $isModalOpen = false;
   // Stocke les images existantes
    public $newImages = [];


    public function store()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:1',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|max:2048',
        ]);

        $produit = Produit::create([
            'nom' => $this->nom,
            'prix' => $this->prix,
            'categorie_id' => $this->category_id,
        ]);

        $this->saveImages($produit);

        session()->flash('success', 'Produit ajouté avec succès !');
        $this->resetForm();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->reset(['produit_id', 'nom', 'prix', 'category_id', 'existingImages', 'newImages']);
    $this->isModalOpen = false;
    }
    public function edit($id)
    {

        $produit = Produit::findOrFail($id);

        $this->produit_id = $produit->id;
        $this->nom = $produit->nom;
        $this->prix = $produit->prix;
        $this->category_id = $produit->categorie_id;
        $this->existingImages = $produit->produitImages->pluck('image_path')->toArray();

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'newImages.*' => 'image|max:2048', // 2MB max par image
        ]);

        $produit = Produit::findOrFail($this->produit_id);
        $produit->update([
            'nom' => $this->nom,
            'prix' => $this->prix,
            'categorie_id' => $this->category_id,
        ]);

        // Gérer les nouvelles images
        if ($this->newImages) {
            foreach ($this->newImages as $image) {
                $path = $image->store('produits', 'public');
                $produit->produitImages()->create(['image_path' => $path]);
            }
        }

        session()->flash('message', 'Produit mis à jour avec succès.');

        $this->closeModal();
    }

    public function removeImage($imageId)
    {
        $image = ProduitImage::findOrFail($imageId);
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        $this->existingImages = ProduitImage::where('produit_id', $this->produit_id)->get()->toArray();
    }

    public function delete($id)
    {
        $produit = Produit::findOrFail($id);
        foreach ($produit->produitImages as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }
        $produit->delete();

        session()->flash('success', 'Produit supprimé avec succès !');
    }

    private function saveImages($produit)
    {
        if ($this->images) {
            foreach ($this->images as $image) {
                $imagePath = $image->store('products', 'public');
                ProduitImage::create([
                    'produit_id' => $produit->id,
                    'image_path' => $imagePath,
                ]);
            }
        }
    }

    private function resetForm()
    {
        $this->reset(['nom', 'prix', 'category_id', 'images', 'produit_id', 'existingImages']);
    }

    public function render()
    {
        return view('livewire.admin.produit-component', [
            'categories' => Categorie::all(),
            'produits' => Produit::with(['categorie', 'produitImages'])->get()->groupBy('categorie_id'),
        ])->layout('layouts.dashboard');
    }
}

