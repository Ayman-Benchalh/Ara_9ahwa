<div class="bg-white shadow-lg rounded-lg p-6  mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Gérer les Catégories</h2>

    <!-- Formulaire d'ajout/modification -->
    <form wire:submit.prevent="{{ $isEdit ? 'updateCategory' : 'addCategory' }}" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nom de la catégorie</label>
            <input type="text" wire:model="name" placeholder="Nom de la catégorie"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2 ">Image</label>

            <label for="img" class="w-full h-40 flex flex-col justify-center items-center cursor-pointer rounded-2xl border-2 border-dashed border-gray-400
                hover:border-blue-500 hover:bg-blue-50 transition duration-300
                @error('image') border-red-500 text-red-700 @enderror">

                <i class="fa-solid fa-cloud-arrow-up text-4xl text-gray-500 mb-2"></i>

                <span class="text-gray-600 font-medium">Glissez et déposez ou</span>
                <span class="text-blue-500 font-semibold">Parcourir une image ou icône</span>

                @error('image')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </label>

            <input type="file" id="img" wire:model="image" class="hidden cursor-pointer">

        </div>


        @if ($image)
            <div class="mt-2">
                <img src="{{ $image->temporaryUrl() }}" class="h-20 rounded-lg shadow-md">
            </div>
        @endif

        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            {{ $isEdit ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>

    @if (session()->has('success'))
        <div class="text-green-500 mt-3">{{ session('success') }}</div>
    @endif

    <!-- Liste des catégories -->
    <div class="overflow-x-auto mt-6">
        <table class="w-full border-collapse bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-100 ">
                <tr class="text-center">
                    <th class="px-4 py-3 ">Image</th>
                    <th class="px-4 py-3 ">Name</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b hover:bg-gray-50 transition text-center">
                        <td class="px-4 py-3 flex justify-center items-center">
                            @if ($category->image)
                                <img src="{{ asset('storage/'.$category->image) }}" class="w-20 h-20 rounded-lg object-cover">
                            @else
                                <span class="text-gray-400">Aucune image</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $category->name }}</td>
                        <td class="px-4 py-3">
                            <button wire:click="editCategory({{ $category->id }})"
                                class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Modifier</button>
                            <button wire:click="deleteCategory({{ $category->id }})"
                                class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition ml-2">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
