<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;
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
# other pages
Route::get('/', function () {
    return view('welcome');
});
#migrate

Route::get('/migrate', [LandingPageController::class, 'migrateFresh']);
Route::get('/detail/{id}', [LandingPageController::class, 'detail']);

# shopping cart route
Route::get('/cart', [ShoppingCartController::class, 'index']);
Route::post('/cart', [ShoppingCartController::class, 'store']);
Route::get('/cars', [LandingPageController::class, 'cars']);
Route::get('/cars-test', [ShoppingCartController::class, 'index']);
Route::get('/clear', [ShoppingCartController::class, 'delete']);
Route::post('/addtocarts', [ShoppingCartController::class, 'addtocarts']);
Route::delete('/remove/{id}', [ShoppingCartController::class, 'remove']);
Route::get('/removeItem/{id}', [ShoppingCartController::class, 'removeItem']);
Route::get('/cart/update', [ShoppingCartController::class, 'perdayItem']);
Route::get('/cart/count', [ShoppingCartController::class, 'count']);
# cart api
Route::get('/cart/api', [ShoppingCartController::class, 'cartJson']);

# checkout
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);


# thank you route
Route::get('/thankyou', function () {
    return view('thankyou');
});

# Api
Route::get('/check/user', [LandingPageController::class, 'checkuser']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
