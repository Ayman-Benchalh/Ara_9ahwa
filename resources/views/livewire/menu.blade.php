<div class="min-h-screen bg-blue-700 text-white">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Menu du Restaurant table Numro :   {{ $table->numero }} </h1>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($produits as $produit)
            {{-- {{ dd($produit->produitImages->first()) }} --}}
            <div class="bg-white text-black rounded-lg shadow-lg overflow-hidden" wire:key="product-{{ $produit->id }}">
                {{-- <img src="asset('{{ $produit->produitImages->first()->image_path }}')" alt="{{ $produit->nom }}" class="w-full h-40 object-cover"> --}}
                <img src="{{ asset('storage/'.$produit->produitImages->first()->image_path) }}" alt="{{ $produit->nom }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $produit->nom }}</h2>
                    <p class="text-gray-600">{{ $produit->description }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-lg font-bold text-blue-700">{{ $produit->prix }} DH</span>
                        <button class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Commander</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
