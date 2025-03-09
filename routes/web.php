<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CommandeController;

use App\Livewire\Admin\TableComponent;
use App\Livewire\Admin\CommandeComponent;
use App\Livewire\Admin\ProduitComponent;
use App\Livewire\Admin\CommandeProduitComponent;
// use App\Livewire\CategoryComponent;
use App\Livewire\Admin\CategoryComponent;
use App\Livewire\Dashboard;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[ClientController::class,'index'])->name('home');
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('admin.login');
    Route::post('/login', [UserController::class, 'doLogin']);
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard',Dashboard::class)->name('dashboard');
        Route::get('/commandes', [CommandeController::class, 'index'])->name('admin.commandes');
        Route::post('/commande/{id}/accepter', [CommandeController::class, 'accepter']);
        Route::post('/logout', [UserController::class, 'logout'])->name('admin.logout');

    });
});

Route::get('/',[ClientController::class,'index'])->name('home');
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('admin.login');
    Route::post('/login', [UserController::class, 'doLogin']);
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        //categories
        Route::get('/categories', CategoryComponent::class)->name('admin.categories');
        // Tables
        Route::get('/tables', TableComponent::class)->name('admin.tables');

        // Commandes
        Route::get('/commandes', CommandeComponent::class)->name('admin.commandes');

        // Produits
        Route::get('/produits', ProduitComponent::class)->name('admin.produits');
        // Produits
        // Route::get('/category', CategoryComponent::class)->name('admin.category');

        // Commande Produits
        Route::get('/commandes/{commande}/produits', CommandeProduitComponent::class)->name('admin.commande.produits');

        Route::post('/logout', [UserController::class, 'logout'])->name('admin.logout');
        // Route::get('/switch-theme', function () {
        //     $currentTheme = session('theme', 'light'); // Get the current theme from the session (default to light)
        //     $newTheme = $currentTheme === 'light' ? 'dark' : 'light'; // Toggle the theme
        //     session(['theme' => $newTheme]); // Store the new theme in the session

        //     return back(); // Redirect back to the previous page
        // })->name('switch.theme');
    });
});
Route::fallback(function () {
    return view('errors.404'); // Assurez-vous d'avoir une vue 404.blade.php dans resources/views/errors/
});
