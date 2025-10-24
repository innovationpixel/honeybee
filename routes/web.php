<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortalController;

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



// WEBSITE ROUTES
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/product/{url}', [HomeController::class, 'product_detail'])->name('product-detail');
Route::get('/our-service', [HomeController::class, 'our_service'])->name('our-service');
Route::get('/service-detail', [HomeController::class, 'service_detail'])->name('service-detail');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/terms-and-conditions', [HomeController::class, 'terms_and_conditions'])->name('terms-and-conditions');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/get-cities', [HomeController::class, 'getCities'])->name('get-cities');
Route::post('/save_contact_form', [HomeController::class, 'save_contact_form'])->name('save_contact_form');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::post('/add_to_cart', [HomeController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/view-cart', function () {
    $cart = Session::get('cart', []);
    return response()->json($cart);
});

Route::post('/remove_from_cart', [HomeController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::get('/cart/mini', [HomeController::class, 'getMiniCart'])->name('cart.mini');
Route::post('/update-cart-quantities', [HomeController::class, 'updateCartQuantities'])->name('update_cart_quantities');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::post('/placeOrder', [HomeController::class, 'placeOrder'])->name('placeOrder');
Route::get('/order-success', [HomeController::class, 'order_success'])->name('order-success');

Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
Route::post('/add-to-wishlist', [HomeController::class, 'add_to_wishlist'])->name('add-to-wishlist');
Route::post('/remove-from-wishlist', [HomeController::class, 'remove_from_wishlist'])->name('remove-from-wishlist');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [HomeController::class, 'my_account'])->name('my-account');
    Route::post('/user/update-profile', [HomeController::class, 'updateProfile'])->name('user.updateProfile');
    Route::post('/user/update-password', [HomeController::class, 'updatePassword'])->name('user.updatePassword');
});

// WEBSITE ROUTES








// PORTAL ROUTES
Route::get('/dashboard', [PortalController::class, 'dashboard'])->name('dashboard');
Route::any('/add-category', [PortalController::class, 'add_category'])->name('add-category');
Route::post('/save-category', [PortalController::class, 'save_category'])->name('save-category');
Route::get('/categories-list', [PortalController::class, 'categories_list'])->name('categories-list');
Route::any('/edit-category/{id}', [PortalController::class, 'edit_category'])->name('edit-category');
Route::post('/update-category', [PortalController::class, 'update_category'])->name('update-category');
Route::get('/delete-category/{id}', [PortalController::class, 'delete_category'])->name('delete-category');

Route::any('/add-sub-category', [PortalController::class, 'add_sub_category'])->name('add-sub-category');
Route::post('/save-sub-category', [PortalController::class, 'save_sub_category'])->name('save-sub-category');
Route::get('/sub-categories-list', [PortalController::class, 'sub_categories_list'])->name('sub-categories-list');
Route::get('/delete-sub-category/{id}', [PortalController::class, 'delete_sub_category'])->name('delete-sub-category');

Route::get('/add-product', [PortalController::class, 'add_product'])->name('add-product')->middleware('auth');
Route::get('/view-product/{id}', [PortalController::class, 'view_product'])->name('view-product')->middleware('auth');
Route::post('/save-product', [PortalController::class, 'save_product'])->name('save-product');
Route::get('/products-list', [PortalController::class, 'products_list'])->name('products-list')->middleware('auth');
Route::get('/edit-product/{id}', [PortalController::class, 'edit_product'])->name('edit-product')->middleware('auth');
Route::post('/update-product', [PortalController::class, 'update_product'])->name('update-product');
Route::get('/deleteProduct/{id}', [PortalController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/product-images/{id}', [PortalController::class, 'product_images'])->name('product-images');
Route::post('/save-product-images', [PortalController::class, 'saveProductImages'])->name('save-product-images');
Route::get('/product-hide/{id}', [PortalController::class, 'product_hide'])->name('product-hide');
Route::get('/product-unhide/{id}', [PortalController::class, 'product_unhide'])->name('product-unhide');
Route::get('/get-sub-categories/{id}', [PortalController::class, 'getSubCategories']);

Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog/{url}', [HomeController::class, 'blog_detail'])->name('blog');
Route::any('/add-blog', [PortalController::class, 'add_blog'])->name('add-blog');
Route::any('/blog_image_upload', [PortalController::class, 'blog_image_upload'])->name('blog_image_upload');
Route::post('/save-blog', [PortalController::class, 'save_blog'])->name('save-blog');
Route::get('/blogs-list', [PortalController::class, 'blogs_list'])->name('blogs-list');
Route::any('/edit-blog/{id}', [PortalController::class, 'edit_blog'])->name('edit-blog');
Route::post('/update-blog', [PortalController::class, 'update_blog'])->name('update-blog');

Route::get('/leads-list', [PortalController::class, 'leads_list'])->name('leads-list')->middleware('auth');
Route::get('/view-lead/{id}', [PortalController::class, 'view_lead'])->name('view-lead')->middleware('auth');
Route::get('/delete-lead/{id}', [PortalController::class, 'delete_lead'])->name('delete-lead')->middleware('auth');

Route::get('/orders-list', [PortalController::class, 'orders_list'])->name('orders-list')->middleware('auth');
Route::post('/change_order_status', [PortalController::class, 'change_order_status'])->name('change_order_status');
Route::get('/view-order-detail/{id}', [PortalController::class, 'view_order_detail'])->name('view-order-detail')->middleware('auth');

Route::get('/customers-list', [PortalController::class, 'customers_list'])->name('customers-list')->middleware('auth');
Route::get('/view-customer/{id}', [PortalController::class, 'view_customer'])->name('view-customer')->middleware('auth');
// PORTAL ROUTES









// MISC ROUTES
Route::get('/clear-all', function () {
    Artisan::call('optimize:clear'); 
    return "✅ All caches (config, route, view, application) cleared successfully!";
});

Route::get('/storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);

    if (!File::exists($fullPath)) {
        abort(404);
    }

    $mimeType = File::mimeType($fullPath);
    return Response::make(File::get($fullPath), 200)->header("Content-Type", $mimeType);
})->where('path', '.*');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Auth::routes();
// MISC ROUTES