<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Log In</h1>
        <p class="text-sm text-center text-gray-500 dark:text-gray-400">Enter your details to log in.</p>

        <!-- Login with Google & Facebook -->
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

        <!-- Global Error Message -->

        <!-- Login Form -->
        <form wire:submit.prevent="login" class="space-y-4">

            <!-- Email Field -->
            <div>
                <label class="block text-xl font-medium text-gray-700 dark:text-gray-400">Email</label>
                <input type="email" wire:model="email" placeholder="you@example.com"
                    class="w-full p-4 px-3 mt-1 text-sm border-1 outline-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600
                   @error('email') border-red-500 bg-red-100 dark:bg-red-500/20 dark:border-red-500 @enderror">
                @error('email')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label class="block text-xl font-medium text-gray-700 dark:text-gray-400">Password</label>
                <input type="password" wire:model="password" placeholder="••••••••"
                    class="w-full p-4 px-3 mt-1 outline-none text-sm border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600
                     @error('password') border-red-500 bg-red-100 dark:bg-red-500/20 dark:border-red-500 @enderror">
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full p-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Log In</button>
        </form>

        <!-- Register Link -->
        <p class="text-sm text-center text-gray-500 dark:text-gray-400">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign Up</a>
        </p>
    </div>
</div>

