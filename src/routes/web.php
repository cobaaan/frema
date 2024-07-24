<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FremaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

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
//Route::post('/product', [ProductController::class, 'productInfo']);

Route::get('/store', [FremaController::class, 'storePage']);

Route::get('/address', [FremaController::class, 'addressPage']);
Route::get('/payment', [FremaController::class, 'paymentPage']);

Route::get('/comment', [CommentController::class, 'commentPage']);
Route::post('/comment', [CommentController::class, 'commentPage']);
Route::post('/comment/send', [CommentController::class, 'commentSend']);

Route::get('/my_page', [FremaController::class, 'myPage']);

Route::get('/profile', [FremaController::class, 'profilePage']);

Route::get('/exhibition', [FremaController::class, 'exhibitionPage']);
Route::post('/exhibition', [ExhibitionController::class, 'exhibition']);

Route::post('/profile/change', [ProfileController::class, 'profileChange']);
Route::post('/profile/payment/change', [ProfileController::class, 'paymentChange']);
Route::post('/profile/address/change', [ProfileController::class, 'addressChange']);

Route::post('/favorite/{id}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');