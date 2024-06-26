<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

Route::get('admin/category',[AdminController::class,'category'])->middleware(['auth','admin']);

Route::post('admin/add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

Route::get('category_delete/{id}',[AdminController::class,'category_delete'])->middleware(['auth','admin']);

Route::get('category_edit/{id}',[AdminController::class,'category_edit'])->middleware(['auth','admin']);

Route::post('category_update/{id}',[AdminController::class,'category_update'])->middleware(['auth','admin']);

Route::get('admin/add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

Route::post('admin/upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

Route::get('admin/view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);

Route::get('admin/view_order',[AdminController::class,'view_order'])->middleware(['auth','admin']);

Route::get('admin/on_way/{id}',[AdminController::class,'on_way'])->middleware(['auth','admin']);

Route::get('admin/deliverd/{id}',[AdminController::class,'deliverd'])->middleware(['auth','admin']);

Route::get('bill/{id}',[AdminController::class,'bill'])->middleware(['auth','verified']);

Route::get('admin/delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);

Route::get('admin/edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);

Route::post('admin/update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);

Route::post('admin/serach_product',[AdminController::class,'serach_product'])->middleware(['auth','admin']);

Route::get('user/shop',[HomeController::class,'shop']);

Route::get('user/search',[HomeController::class,'serach_product']);

Route::get('user/product/{id}',[HomeController::class,'product']);

Route::get('user/add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);

Route::get('user/my_cart',[HomeController::class,'my_cart'])->middleware(['auth', 'verified']);

Route::get('user/remove_cart/{id}',[HomeController::class,'remove_cart'])->middleware(['auth', 'verified']);

Route::post('user/order',[HomeController::class,'order'])->middleware(['auth', 'verified']);

Route::get('user/my_order',[HomeController::class,'my_order'])->middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{total}', 'stripe');
    Route::post('stripe/{total}', 'stripePost')->name('stripe.post');
});

Route::get('user/about_us',[HomeController::class,'about_us']);

Route::get('user/contact',[HomeController::class,'contact']);