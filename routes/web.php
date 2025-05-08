<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return redirect()->route('aboutus');
});

Route::get('/home/{category}', [OfferController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login',[AuthController::class, 'login']);

Route::get('/register',  [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/offers/categories', [OfferController::class, 'searchByCategories']);
Route::post('/offers', [OfferController::class, 'filter']);
Route::get('/offers', [OfferController::class, 'offers'])->name('offers');
Route::get('/aboutus', [UserController::class, 'aboutus'])->name('aboutus');

Route::get('/community', [PostController::class, 'render']);
Route::post('/community', [PostController::class, 'createPost']);
Route::get('/community/like/{id}', [ReactionController::class, 'like']);
// Route::get('/community', [::class, '']);

Route::get('/admin/index', [UserController::class, 'indexAdmin'])->name('adminindex');
Route::post('/admin/active/{id}', [UserController::class, 'activeUser'])->name('activeUser');
Route::post('/admin/block/{id}', [UserController::class, 'blockUser'])->name('blockUser');
Route::post('/admin/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::post('/admin/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');


Route::get('/admin/offers', [OfferController::class, 'offersAdmin'])->name('adminoffers');
Route::get('/admin/single-offer/{id}', [OfferController::class, 'singleOffer']);
Route::put('admin/edit/offer', [OfferController::class, 'updateOffer'])->name('updateOffer');
Route::delete('/admin/offer/delete/{id}', [OfferController::class, 'deleteOffer'])->name('deleteOffer');
Route::get('/admin/create/post', [OfferController::class, 'createOffer'])->name('createOffer');
Route::post('/admin/create/post', [OfferController::class, 'storeOffer'])->name('storeOffer');
// Route::get('/admin/country/cities/{id}', [AddressController::class, 'citiesByCountry'])->name('citiesByCountry');
// Route::post('/admin/create/post', [OfferController::class, 'createOffer'])->name('createOffer');


Route::get('admin/posts', [PostController::class, 'allPosts'])->name('allPosts');
Route::post('/admin/delete/post/{id}', [PostController::class, 'deletePost'])->name('deletePost');

Route::fallback(function(){
    return view('errors.404');
});