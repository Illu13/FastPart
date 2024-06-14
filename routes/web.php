<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwitterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/uploadproduct', [App\Http\Controllers\ProductController::class, 'create'])->name('product.upload');
    Route::resource('/product', App\Http\Controllers\ProductController::class)->middleware('verified');
    Route::get('/allproducts', [App\Http\Controllers\ProductController::class, 'index'])->name('seeall');
    Route::get('/myproducts', [App\Http\Controllers\ProductController::class, 'myproducts'])->name('product.myproducts');
    Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart', [\App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');

})->middleware('verified');
Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
Route::controller(TwitterController::class)->group(function () {
    Route::get('auth/twitter', 'redirectToTwitter')->name('auth.twitter');
    Route::get('auth/twitter/callback', 'handleTwitterCallback');
    Route::get('/users', [App\Http\Controllers\ProfileController::class, 'index'])->middleware(['auth', 'admin'])->name('users');
    Route::get('/productsindexadmin', [App\Http\Controllers\ProductController::class, 'adminGames'])->middleware(['auth', 'admin'])->name('product.list');

});
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about-us');
Route::get('/cookies', [PageController::class, 'cookies'])->name('cookies');

require __DIR__ . '/auth.php';
