<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ara 9ahwa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>
<body class="bg-gray-100">



                <div class="flex h-screen relative">
                    <!-- Sidebar -->
                    <aside class="w-64 h-full bg-blue-900 text-white p-5">
                        <h2 class="text-2xl font-bold">Admin Dashboard</h2>
                        <nav class="mt-6">
                            <ul>
                                <li class="mb-3"><a href="{{ route('dashboard') }}" class="block p-2 hover:bg-blue-700 rounded gap-3">
                                    <i class="fa-solid fa-house text-white pr-3" "></i> Tableau de bord</a></li>
                                <li class="mb-3"><a href="{{ route('admin.produits') }}" class="block p-2 hover:bg-blue-700 rounded">📦 Produits</a></li>
                                <li class="mb-3"><a href="{{ route('admin.commandes') }}" class="block p-2 hover:bg-blue-700 rounded">🛒 Commandes</a></li>
                                <li class="mb-3"><a href="{{ route('admin.tables') }}" class="block p-2 hover:bg-blue-700 rounded">🍽️ Tables</a></li>
                                <li class="mb-3"><a href="{{ route('admin.categories') }}" class="block p-2 hover:bg-blue-700 rounded"><i class="fa-solid fa-utensils text-white pr-3"></i> Category</a></li>
                            </ul>
                        </nav>
                    </aside>

                    <!-- Main Content -->
                    <section class="flex-1 h-screen p-6 overflow-y-auto">
                        {{ $slot }}
                    </section>



                    <div class="disconnection absolute top-2 right-2">
                        <div class="btn">
                            <form action="{{ route('admin.logout') }}" method="POST" class="bg-white w-10 h-10 flex justify-center items-center rounded-full  shadow-md">
                                @csrf


                                <button type="submit" class="w-full h-full flex justify-center items-center rounded-full p-2  cursor-pointer transition duration-300 hover:scale-75 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#d9020d" d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 224c0 17.7 14.3 32 32 32s32-14.3 32-32l0-224zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z"/></svg>
                                         </button>
                            </form>
                        </div>
                    </div>
                </div>



    @livewireScripts
</body>
</html>

