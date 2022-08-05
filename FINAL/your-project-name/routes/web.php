<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/categories',[CategoryController::class,'index'])->name('admin.categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('admin.categories.create');
    Route::post('/categories',[CategoryController::class,'store'])->name('admin.categories.store');
    Route::get('/categories/{category:slug}/edit',[CategoryController::class,'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category:slug}',[CategoryController::class,'update'])->name('admin.categories.update');
    Route::delete('/categories/{category:slug}',[CategoryController::class,'destroy'])->name('admin.categories.destroy');

    Route::get('/brands',[BrandController::class,'index'])->name('admin.brands.index');
    Route::post('/brands',[BrandController::class,'store'])->name('admin.brands.store');

    Route::get('/products',[ProductController::class,'index'])->name('admin.products.index');
    Route::get('/products/create',[ProductController::class,'create'])->name('admin.products.create');
    Route::post('/products',[ProductController::class,'store'])->name('admin.products.store');
    Route::delete('/products/{product:slug}',[ProductController::class,'destroy'])->name('admin.products.destroy');

    Route::get('/payments_list',[PaymentController::class,'paymentsList'])->name('paymentsList');

    Route::get('/show_messages',[MessageController::class,'showMessage'])->name('show_message');
    Route::get('/single_message/{id}',[MessageController::class,'singleMessage'])->name('single_message');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/cart_list',[ProductController::class,'cartList'])->name('product.cart_list');
    Route::post("add_to_cart",[ProductController::class,'addToCart'])->name('product.add_to_cart');
    Route::delete('/cartdelete/{cart}',[ProductController::class,'cartDelete'])->name('cartdelete');

    
    Route::post('/payment',[PaymentController::class,'pay'])->name('payment');
    Route::get('/success',[PaymentController::class,'success'])->name('success');
    Route::get('/error',[PaymentController::class,'error'])->name('error');

    Route::get('/create_message/{id}',[MessageController::class,'createMessage'])->name('create_message');
    Route::post('/send_message',[MessageController::class,'sendMessage'])->name('send_message');
   

});

Route::get('/landing_page',[LandingPageController::class,'index'])->name('landingPage.index');
Route::get('/landing_page/{product:slug}/show',[LandingPageController::class,'show'])->name('landingPage.show');
Route::get('/search',[ProductController::class,'search'])->name('search');