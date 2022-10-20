<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerItemController;
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

Route::get('/', [ItemController::class, 'list'])->name('home');
Route::get('/products/{id}', [ItemController::class, 'view'])->name('product');
Route::post('/payments/products', [PaymentController::class, 'index'])->name('payment')->middleware(['auth', 'verified']);

Route::any('/payment/return/{item}', [PaymentController::class, 'paymentReturn'])->name('payment.return');
Route::any('/payment/cancel/{item}', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::any('/payment/success/{item}', [PaymentController::class, 'success'])->name('payment.success');
Route::any('/payment/failed/{item}', [PaymentController::class, 'failed'])->name('payment.failed');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/ratings', RatingController::class)->middleware(['auth', 'verified']);

Route::resource('/items', SellerItemController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
