<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::get('/',  [HomeController::class , 'index']);

Route::get('/products', [ProductController::class, "index"]);
Route::get('/product/{product}', [ProductController::class, "show"]);
Route::get('products/create', [ProductController::class, "create"])->middleware('admin');
Route::post('product/store', [ProductController::class, "store"])->middleware('admin');
Route::get('product/update/{product}', [ProductController::class, "edit"])->middleware('admin');
Route::post('product/update/{product}', [ProductController::class, "update"])->middleware('admin');
Route::post('product/destroy/{product}', [ProductController::class, "destroy"])->middleware('admin');


Route::get('/cart', [CartController::class, "index"])->middleware('auth');
Route::post('/cart', [CartController::class, "store"])->middleware('auth');
Route::post('/cart/destroy/{cart}', [CartController::class, "destroy"])->middleware('auth');


Route::get('profile', [ProfileController::class, "index"])->middleware('auth');
Route::post('profile/{user}', [ProfileController::class, "update"])->middleware('auth');


Route::get("users", [UserController::class, "index"])->middleware("admin");
Route::post('payment', [PaymentController::class, "store"])->middleware(("customer"));
Route::get('payment', [PaymentController::class, "create"])->middleware(("customer"));

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [ ProfileController::class, 'about']);
Route::get('/contact', [ ProfileController::class, 'contacts']);
Route::post('/email', [ ProfileController::class, 'email']);


Route::get('favorite', [FavoritesController::class, "index"])->middleware(("customer"));
Route::post('favorite', [FavoritesController::class, "store"])->middleware(("customer"));
Route::delete('favorite/{slot}', [FavoritesController::class, "destroy"])->middleware(("customer"));

Route::get('stripe',  [StripePaymentController::class , 'stripe'])->middleware(("customer"));
Route::post('stripe',  [StripePaymentController::class , 'stripePost'])->name('stripe.post')->middleware(("customer"));




