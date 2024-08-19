<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FortifyController;
use App\Http\Controllers\FremaController;
use App\Http\Controllers\MailController;
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

Route::get('/register', [FortifyController::class, 'registerPage']);
Route::get('/login', [FortifyController::class, 'loginPage']);
Route::post('/logout', [FortifyController::class, 'logout'])->name('logout');
Route::post('/login', [FortifyController::class, 'login']);

Route::get('/', [FremaController::class, 'top'])->name('/');
Route::get('/thanks', [FremaController::class, 'thanks']);
//Route::post('/logout', [FremaController::class, 'logout'])->name('logout');

Route::post('/product', [ProductController::class, 'productPage']);
Route::get('/product/{id}', [ProductController::class, 'productPage'])->name('product.page');

Route::get('/store/{id}', [StoreController::class, 'storePage'])->name('store.page');
Route::post('/store/{id}', [StoreController::class, 'storePage'])->name('store.page');



Route::get('/comment/page{id}', [CommentController::class, 'commentPage'])->name('comment.page');
Route::post('/comment/page{id}', [CommentController::class, 'commentPage'])->name('comment.page');

//Route::get('/comment', [CommentController::class, 'commentPage']);
//Route::post('/comment', [CommentController::class, 'commentPage']);
Route::post('/comment/send', [CommentController::class, 'commentSend']);

Route::get('/my/page{id}', [FremaController::class, 'myPage'])->name('my.page');
//Route::get('/my/page{id}', [FremaController::class, 'myPage']);

//Route::get('/profile', [FremaController::class, 'profilePage']);

//Route::get('/exhibition', [FremaController::class, 'exhibitionPage'])->name('exhibition.page');
Route::get('/exhibition', [ExhibitionController::class, 'exhibitionPage'])->name('exhibition.page');
Route::post('/exhibition', [ExhibitionController::class, 'exhibition']);

Route::get('/profile{id}', [ProfileController::class, 'profilePage'])->name('profile.page');

Route::post('/profile/change', [ProfileController::class, 'profileChange']);

Route::post('/profile/payment', [ProfileController::class, 'paymentPage']);
Route::post('/profile/payment/change', [ProfileController::class, 'paymentChange']);

Route::get('/profile/address', [ProfileController::class, 'addressPage']);
Route::post('/profile/address', [ProfileController::class, 'addressPage']);
Route::post('/profile/address/change', [ProfileController::class, 'addressChange']);

Route::post('/favorite/{id}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');


Route::get('/credit', [PaymentController::class, 'credit']);
Route::post('/credit', [PaymentController::class, 'credit']);
/*
Route::get('/convenience', [PaymentController::class, 'convenience']);
Route::post('/convenience', [PaymentController::class, 'convenience']);
Route::get('/payment/convenience', [PaymentController::class, 'paymentConvenience']);
Route::post('/payment/convenience', [PaymentController::class, 'paymentConvenience'])->name('payment.convenience');
Route::get('/bank', [PaymentController::class, 'bank']);
Route::post('/bank', [PaymentController::class, 'bank']);
*/
Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/create', [PaymentController::class, 'create'])->name('create');
    Route::post('/credit', [PaymentController::class, 'paymentCredit'])->name('credit');
});


//Route::post('/create-payment-intent', 'PaymentController@paymentConvenience');
//Route::post('/create-payment-intent', [PaymentController::class, 'paymentConvenience']);


Route::get('/admin/user', [AdminController::class, 'userListPage'])->name('user.list.page');
Route::post('/admin/user/delete', [AdminController::class, 'userDelete']);

Route::get('/admin/comment', [AdminController::class, 'commentListPage'])->name('comment.list.page');
Route::post('/admin/comment/delete', [AdminController::class, 'commentDelete']);

Route::get('/mail', [MailController::class, 'mailForm'])->name('mail.form');
Route::post('/mail/send', [MailController::class, 'mailSend']);

//Route::post('/login', [FremaController::class, 'login']);