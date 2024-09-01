<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FortifyController;
use App\Http\Controllers\FremaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SellController;

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

Route::prefix('admin')->group(function () {
    Route::get('/user', [AdminController::class, 'userListPage'])->name('user.list.page');
    Route::post('/user/delete', [AdminController::class, 'userDelete']);
    Route::get('/comment', [AdminController::class, 'commentListPage'])->name('comment.list.page');
    Route::post('/comment/delete', [AdminController::class, 'commentDelete']);
});

Route::prefix('comment')->group(function () {
    Route::get('/page{id}', [CommentController::class, 'commentPage'])->name('comment.page');
    Route::post('/page{id}', [CommentController::class, 'commentPage']);
    Route::post('/send', [CommentController::class, 'commentSend']);
});

Route::post('/favorite/{id}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');

Route::get('/register', [FortifyController::class, 'registerPage']);
Route::get('/login', [FortifyController::class, 'loginPage']);
Route::post('/logout', [FortifyController::class, 'logout'])->name('logout');
Route::post('/login', [FortifyController::class, 'login']);

Route::get('/', [FremaController::class, 'top'])->name('/');
Route::get('/thanks', [FremaController::class, 'thanks']);
Route::get('/mypage{id}', [FremaController::class, 'myPage'])->name('my.page');

Route::prefix('mail')->group(function () {
    Route::get('/', [MailController::class, 'mailForm'])->name('mail.form');
    Route::post('/send', [MailController::class, 'mailSend']);
});

Route::prefix('credit')->group(function () {
    Route::get('/', [PaymentController::class, 'credit']);
    Route::post('/', [PaymentController::class, 'credit']);
    Route::post('/payment', [PaymentController::class, 'paymentCredit'])->name('payment.credit');
});

Route::get('/profile{id}', [ProfileController::class, 'profilePage'])->name('profile.page');
Route::prefix('profile')->group(function () {
    Route::post('/change', [ProfileController::class, 'profileChange']);
    Route::post('/payment', [ProfileController::class, 'paymentPage']);
    Route::post('/payment/change', [ProfileController::class, 'paymentChange']);
    Route::get('/address', [ProfileController::class, 'addressPage']);
    Route::post('/address', [ProfileController::class, 'addressPage']);
    Route::post('/address/change', [ProfileController::class, 'addressChange']);
});

Route::get('/product/{id}', [ProductController::class, 'productPage'])->name('product.page');

Route::prefix('purchase')->group(function () {
    Route::get('/{id}', [PurchaseController::class, 'purchasePage'])->name('purchase.page');
    Route::post('/{id}', [PurchaseController::class, 'purchasePage'])->name('purchase.page');
});

Route::get('/sell/page', [SellController::class, 'sellPage'])->name('sell.page');
Route::post('/sell', [SellController::class, 'sell'])->middleware('web');