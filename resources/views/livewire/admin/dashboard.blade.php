<div class="w-full">


<h1 class="text-3xl font-bold mb-4">Dashboard</h1>

<!-- Produits -->
<h2 class="text-2xl font-semibold mb-3">Produits</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">
    @foreach ($produits as $categorieProduits)
    @foreach ($categorieProduits as $prod)
    {{-- {{ dd($prod) }} --}}
    {{-- {{ dd($prod->produitImages->first()->image_path) }} --}}

    <div class="bg-white shadow rounded-xl p-1 relative" wire:key="product-{{ $prod->id }}">
                <img src="{{asset('Storage/'. $prod->produitImages->first()->image_path )}}" alt="Produit" class="w-full h-48 object-cover rounded-xl" >

            <div class="p-3 flex gap-2 flex-col">
                <h3 class="text-2xl font-semibold tracking-tight text-gray-900 ">{{ $prod->nom }}</h3>

                {{-- <p class="text-gray-700">Prix: {{ $product->prix }} DH</p> --}}
                <p class=" text-[15px] shadow-2xs font-bold bg-amber-400 p-2 rounded-2xl text-white absolute top-2 right-2">{{ $prod->prix }} DH</p>
                <p class=" text-[15px] font-bold text-gray-900/50 ">Categorie {{ $prod->categorie->name }}  </p>


                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Détails</button>
            </div>
        </div>
        @endforeach
@endforeach



</div>

<!-- Commandes -->
<h2 class="text-2xl font-semibold mt-6 mb-3">Commandes</h2>
<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-3">#</th>
            <th class="p-3">Table</th>
            <th class="p-3">Statut</th>
            <th class="p-3">Total</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b text-center" wire:foreach="commandes as commande">
            {{-- <td class="p-3">{{ commande.id }}</td>
            <td class="p-3">{{ commande.table_id }}</td>
            <td class="p-3">{{ commande.statut }}</td>
            <td class="p-3">{{ commande.total_prix }} DH</td> --}}
            <td class=" p-3">1</td>
            <td class="p-3">10</td>
            <td class="p-3">dd</td>
            <td class="p-3">150 DH</td>
            <td class="p-3">
                <button class="w-full bg-green-500 text-white px-3 py-1 rounded">Détails</button>
            </td>
        </tr>
    </tbody>
</table>
</div>
