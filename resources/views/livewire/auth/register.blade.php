<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <form wire:submit.prevent="register" class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Créer un compte</h2>

        <!-- Message d'erreur global -->
        @if(session()->has('error'))
            <div class="flex items-center p-3 text-sm text-red-700 bg-red-100 border border-red-500 rounded-lg">
                <img src="https://www.svgrepo.com/show/206432/alert.svg" class="w-5 h-5 mr-2" alt="Alert">
                <span>{{ session('error') }}</span>
            </div>
        @endif
        <div class="flex space-x-4">
            <button class="w-1/2 flex items-center justify-center gap-2 p-3 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google">

                Google
            </button>
            <button class="w-1/2 flex items-center justify-center gap-2 p-3 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-5 h-5" alt="Facebook">
                Facebook
            </button>
        </div>

        <!-- Separator -->
        <div class="flex items-center my-4">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-3 text-gray-500 dark:text-gray-400">Or</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>
        <!-- Champ Nom -->
        <div>
            <input type="text" wire:model="name" placeholder="Nom"
                class="w-full p-3 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 @error('name') border-red-500 @enderror">
            @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Champ Email -->
        <div>
            <input type="email" wire:model="email" placeholder="Email"
                class="w-full p-3 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror">
            @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Champ Mot de passe -->
        <div>
            <input type="password" wire:model="password" placeholder="Mot de passe"
                class="w-full p-3 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 @error('password') border-red-500 @enderror">
            @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Champ Confirmation du mot de passe -->
        <div>
            <input type="password" wire:model="password_confirmation" placeholder="Confirmer le mot de passe"
                class="w-full p-3 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 @error('password_confirmation') border-red-500 @enderror">
            @error('password_confirmation') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Bouton S'inscrire -->
        <button type="submit"
            class="w-full p-3 text-white bg-green-600 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">S'inscrire</button>

        <!-- Lien vers la connexion -->
        <p class="text-sm text-center text-gray-500 dark:text-gray-400">
            Déjà un compte ?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
        </p>
    </form>
</div>
