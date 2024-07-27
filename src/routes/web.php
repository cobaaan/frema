<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FremaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FremaController::class, 'top']);
Route::get('/thanks', [FremaController::class, 'thanks']);
Route::get('/register', [FremaController::class, 'registerPage']);
Route::get('/login', [FremaController::class, 'loginPage']);

Route::post('/product', [ProductController::class, 'productPage']);
Route::get('/product', [ProductController::class, 'productPage']);

Route::get('/store', [StoreController::class, 'storePage']);
Route::post('/store', [StoreController::class, 'storePage']);


Route::get('/comment', [CommentController::class, 'commentPage']);
Route::post('/comment', [CommentController::class, 'commentPage']);
Route::post('/comment/send', [CommentController::class, 'commentSend']);

Route::get('/my_page', [FremaController::class, 'myPage']);

Route::get('/profile', [FremaController::class, 'profilePage']);

Route::get('/exhibition', [FremaController::class, 'exhibitionPage']);
Route::post('/exhibition', [ExhibitionController::class, 'exhibition']);

Route::post('/profile/change', [ProfileController::class, 'profileChange']);

Route::get('/profile/payment', [ProfileController::class, 'paymentPage']);
Route::post('/profile/payment/change', [ProfileController::class, 'paymentChange']);

//Route::get('/profile/address', [ProfileController::class, 'addressPage']);
Route::post('/profile/address', [ProfileController::class, 'addressPage']);
Route::post('/profile/address/change', [ProfileController::class, 'addressChange']);

Route::post('/favorite/{id}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');


Route::get('/credit', [PaymentController::class, 'credit']);
Route::post('/credit', [PaymentController::class, 'credit']);
Route::get('/convenience', [PaymentController::class, 'convenience']);
Route::post('/convenience', [PaymentController::class, 'convenience']);
Route::get('/payment/convenience', [PaymentController::class, 'paymentConvenience']);
Route::post('/payment/convenience', [PaymentController::class, 'paymentConvenience'])->name('payment.convenience');
Route::get('/bank', [PaymentController::class, 'bank']);
Route::post('/bank', [PaymentController::class, 'bank']);

Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/create', [PaymentController::class, 'create'])->name('create');
    Route::post('/credit', [PaymentController::class, 'paymentCredit'])->name('credit');
});


//Route::post('/create-payment-intent', 'PaymentController@paymentConvenience');
Route::post('/create-payment-intent', [PaymentController::class, 'paymentConvenience']);