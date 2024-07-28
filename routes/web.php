<?php

use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TamuController;
use App\Http\Controllers\Admin\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // AdminController Allroute
    Route::controller(AdminController::class)->group(function () {
        Route::get('admin/logout', 'adminLogout')->name('admin.logout');
        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');
    });

    // Category All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('all/category', 'allCategory')->name('all.category');
        Route::get('add/category', 'addCategory')->name('add.category');
        Route::get('category/store', 'categoryStore')->name('category.store');

        Route::get('/category/edit/{id}', 'editCategory')->name('category.edit');
        Route::post('/category/update', 'updateCategory')->name('category.update');
        Route::get('/category/delete/{id}', 'deleteCategory')->name('category.delete');
    });

    // product All Route
    Route::controller(ProductController::class)->group(function () {
        Route::get('all/product', 'allProduct')->name('all.product');
        Route::get('add/product', 'addProduct')->name('add.product');

        Route::post('/product/store', 'storeProduct')->name('product.store');
        Route::get('/product/edit/{id}', 'editProduct')->name('product.edit');
        Route::post('/product/update', 'updateProduct')->name('product.update');
        Route::get('/product/delete/{id}', 'deleteProduct')->name('product.delete');
    });

    // Booking All Route
    Route::controller(BookingController::class)->group(function () {
        Route::get('/kamar', 'Kamar')->name('kamar');

        Route::get('/booking/{id}', 'Booking')->name('booking');
        Route::post('/booking/store', 'BookingStore')->name('booking.store');
        Route::get('/all/booking', 'allBooking')->name('all.booking');
        Route::get('/details/booking/{id}', 'BookingDetails')->name('booking.details');

        Route::post('/booking/update', 'BookingUpdate')->name('booking.update');
        Route::get('/complete/booking', 'completeBooking')->name('complete.booking');
        Route::get('/booking/delete/{id}', 'BookingDelete')->name('booking.delete');
    });

    // Tamu All Route
    Route::controller(TamuController::class)->group(function () {
        Route::get('all/tamu', 'allTamu')->name('all.tamu');
        Route::get('add/tamu', 'addTamu')->name('add.tamu');

        Route::post('/tamu/store', 'storeTamu')->name('tamu.store');
        Route::get('/tamu/edit/{id}', 'editTamu')->name('tamu.edit');
        Route::post('/tamu/update', 'updateTamu')->name('tamu.update');
        Route::get('/tamu/delete/{id}', 'deleteTamu')->name('tamu.delete');
    });
    // transaksi All Route
    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi', 'transaksi')->name('transaksi');
        Route::post('/add-cart', 'addCart');
        Route::get('/allitem', 'allItem');
        Route::post('/cart-update/{rowId}', 'updateCart');
        Route::get('/cart-delete/{rowId}', 'deleteCart');

        Route::post('/create-invoice', 'createInvoice');
    });
});

require __DIR__ . '/auth.php';
