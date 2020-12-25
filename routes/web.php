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


Auth::routes();


/// User Routes


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/order/{id}', [App\Http\Controllers\ProductController::class, 'order'])->name('order')->middleware('auth');
Route::post('/create/order/{id}', [App\Http\Controllers\ProductController::class, 'create_order'])->name('create_order')->middleware('auth');
Route::get('/success', function(){
    return view('products.success');
})->name('success')->middleware('auth');






/// Admin DashBoard Routes

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin_categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
Route::get('/admin_add_cat', [App\Http\Controllers\AdminController::class, 'add_categories'])->name('add_cat');
Route::post('/admin_save_cat', [App\Http\Controllers\AdminController::class, 'save_categories'])->name('save_cat');
Route::post('/admin_save_sub_cat', [App\Http\Controllers\AdminController::class, 'save_sub_categories'])->name('save_sub_cat');
Route::get('/admin_add_sub_cat/{id}', [App\Http\Controllers\AdminController::class, 'add_sub_categories'])->name('add_sub_cat');
Route::get('/admin_sub_cat/{id}', [App\Http\Controllers\AdminController::class, 'sub_categories'])->name('sub_cat');

Route::get('/admin_products}', [App\Http\Controllers\AdminController::class, 'products'])->name('admin_products');
Route::get('/admin_add_products}', [App\Http\Controllers\AdminController::class, 'add_products'])->name('add_products');
Route::post('/admin_save_product', [App\Http\Controllers\AdminController::class, 'save_product'])->name('save_product');

Route::get('/admin_orders}', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin_orders');


/// Android APIs Routes

// GET METHODS
Route::get('/categories_api', [App\Http\Controllers\ApiController::class, 'categories']);
Route::get('/products_api', [App\Http\Controllers\ApiController::class, 'products']);
Route::get('/products_category_api/{id}', [App\Http\Controllers\ApiController::class, 'products_category']);
Route::get('/product_api/{id}', [App\Http\Controllers\ApiController::class, 'product']);
Route::get('/profile_api/{id}', [App\Http\Controllers\ApiController::class, 'profile']);
Route::get('/search_api', [App\Http\Controllers\ApiController::class, 'search'])->name('search');

// POST METHODS
//Route::post('/create/order_api/{id}/{user}', [App\Http\Controllers\ApiController::class, 'create_order'])->middleware('auth:api');




Route::get('storage/{dir}/{file}', function($dir,$file){
    $path = storage_path('app' . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR .$file );
    return response()->file($path);
});
