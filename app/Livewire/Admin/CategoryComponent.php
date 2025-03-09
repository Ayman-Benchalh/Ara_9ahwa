<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class CategoryComponent extends Component
{
    // public function render()
    // {
    //     return view('livewire.admin.category-component');
    // }
    use WithFileUploads;

    public $categories, $name, $image, $categoryId;
    public $isEdit = false;

    public function mount()
    {
        $this->categories = Categorie::all();
    }

    public function addCategory()
    {
        $this->validate([
            'name' => 'required|string|unique:categories,name',
            'image' => 'nullable|image|max:1024' // Max 1MB
        ]);

        $imagePath = $this->image ? $this->image->store('categories', 'public') : null;

        Categorie::create([
            'name' => $this->name,
            'image' => $imagePath
        ]);

        session()->flash('success', 'Catégorie ajoutée avec succès !');
        $this->resetFields();
    }

    public function editCategory($id)
    {
        $category = Categorie::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->image = null;
        $this->isEdit = true;
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|string|unique:categories,name,'.$this->categoryId,
            'image' => 'nullable|image|max:1024'
        ]);

        $category = Categorie::findOrFail($this->categoryId);
        $imagePath = $category->image;

        if ($this->image) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $imagePath = $this->image->store('categories', 'public');
        }

        $category->update([
            'name' => $this->name,
            'image' => $imagePath
        ]);

        session()->flash('success', 'Catégorie mise à jour avec succès !');
        $this->resetFields();
    }

    public function deleteCategory($id)
    {
        $category = Categorie::findOrFail($id);
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        session()->flash('success', 'Catégorie supprimée avec succès !');
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->image = null;
        $this->isEdit = false;
        $this->categoryId = null;
        $this->categories = Categorie::all();
    }

    public function render()
    {
        return view('livewire.admin.category-component')->layout('layouts.dashboard');
    }
}
