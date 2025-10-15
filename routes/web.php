<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop-detail', [HomeController::class, 'shop_detail'])->name('shop-detail');
Route::get('/our-service', [HomeController::class, 'our_service'])->name('our-service');
Route::get('/service-detail', [HomeController::class, 'service_detail'])->name('service-detail');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::post('/save_contact_form', [HomeController::class, 'save_contact_form'])->name('save_contact_form');









