<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 HOME (PÚBLICO)
Route::get('/', function () {
    $products = Product::all();
    return view('home', compact('products'));
});

// 📊 DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 PERFIL (USUARIOS AUTENTICADOS)
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🛒 CARRITO (CLIENTES)
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// 👑 ADMIN (SOLO ADMIN PUEDE GESTIONAR PRODUCTOS)
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('products', ProductController::class);
    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products');

    Route::resource('products', ProductController::class);
});

require __DIR__ . '/auth.php';
