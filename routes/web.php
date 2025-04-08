<?php

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
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/01_about', function () {
    return view('01_about');
});
Route::get('/01_blog', function () {
    return view('01_blog');
});
Route::get('/01_careers', function () {
    return view('01_careers');
});
Route::get('/01_contact', function () {
    return view('01_contact');
});
Route::get('/01_faqs', function () {
    return view('01_faqs');
});
Route::get('/01_services', function () {
    return view('01_services');
});
Route::get('/01_shop', function () {
    return view('01_shop');
});
Route::get('/01_single-blog', function () {
    return view('01_single-blog');
});
Route::get('/01_single-product', function () {
    return view('01_single-product');
});
Route::get('/01_single-services', function () {
    return view('01_single-services');
});
Route::get('/01_single-team', function () {
    return view('01_single-team');
});
Route::get('/01_single-work', function () {
    return view('01_single-work');
});
Route::get('/01_team', function () {
    return view('01_team');
});
Route::get('/01_testimonial', function () {
    return view('01_testimonial');
});
Route::get('/01_work', function () {
    return view('01_work');
});
