<div class="bg-white shadow-lg rounded-lg p-6 mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ajouter un Produit</h2>

    <form wire:submit.prevent="store" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nom du produit</label>
            <input type="text" wire:model="nom" placeholder="Nom du produit"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
            @error('nom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Prix</label>
            <input type="number" wire:model="prix" placeholder="Prix"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
            @error('prix') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Catégorie</label>
            <select wire:model="category_id"
                class="w-full px-4 text-black py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Upload Images -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Images</label>
            <input type="file" id="images" wire:model="images" multiple class="hidden">
            <label for="images" class="w-full h-40 flex flex-col justify-center items-center cursor-pointer rounded-2xl border-2 border-dashed border-gray-400 hover:border-blue-500 hover:bg-blue-50 transition duration-300">
                <i class="fa-solid fa-cloud-arrow-up text-4xl text-gray-500 mb-2"></i>
                <span class="text-gray-600 font-medium">Glissez et déposez ou</span>
                <span class="text-blue-500 font-semibold">Parcourir des images</span>
            </label>
            @error('images.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <!-- Affichage des images sélectionnées -->
            <div class="mt-4 flex space-x-2">
                @foreach($images as $image)
                    <img src="{{ $image->temporaryUrl() }}" class="w-16 h-16 object-cover rounded-lg border">
                @endforeach
            </div>
        </div>

        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Ajouter</button>
    </form>

    <!-- Affichage des Produits par Catégorie -->
    <div class="mt-8">
        @foreach($produits as $categorie_id => $produitsParCategorie)
            <h3 class="text-xl font-semibold text-white my-4 border-2 border-blue-700 bg-blue-600 rounded-2xl p-2">
                {{ $categories->find($categorie_id)?->name }}
            </h3>
            <div class="relative w-full overflow-hidden px-7">
                <div class="flex space-x-4 snap-x py-2">
                    @foreach($produitsParCategorie as $product)
                        <div class="bg-white border-2 relative border-black/50 rounded-lg shadow-md p-2 min-w-[250px] w-[300px] snap-center">
                            @if($product->produitImages->first())
                                <img src="{{ asset('storage/' . $product->produitImages->first()->image_path) }}" class="w-full h-40 object-cover rounded-lg">
                            @endif
                            <div class="p-2">
                                <h4 class="mt-2 text-lg font-semibold">{{ $product->nom }}</h4>
                                <p class="text-gray-600">{{ $product->prix }} DH</p>
                            </div>
                            <button wire:click="edit({{ $product->id }})" class="bg-green-400 text-white w-9 h-9 rounded-full border-2 border-green-500 duration-300 hover:bg-green-600 transition absolute -top-2 -left-2">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button wire:click="delete({{ $product->id }})" class="bg-red-400 text-white w-9 h-9 border-2 border-red-500 duration-300 hover:bg-red-600 transition rounded-full absolute -top-2 -right-2">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <!-- Button Modifier -->
{{-- <button wire:click="edit({{ $produit->id }})" class="bg-blue-500 text-white px-4 py-2 rounded">
    Modifier
</button> --}}

<!-- Modal -->

</div>

</div>
