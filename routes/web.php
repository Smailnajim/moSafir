<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PostController;
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
// Route::get('/community', [::class, '']);

Route::get('/admin/index', [UserController::class, 'indexAdmin'])->name('adminindex');
Route::post('/admin/active/{id}', [UserController::class, 'activeUser'])->name('activeUser');
Route::post('/admin/block/{id}', [UserController::class, 'blockUser'])->name('blockUser');
Route::post('/admin/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');