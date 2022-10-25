<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\Admin\AdminRatingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SellerItemController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
Route::get('/products/{id}', [ItemController::class, 'view'])->name('product')->middleware(['auth', 'verified']);;
Route::post('/payments/products', [PaymentController::class, 'index'])->name('payment')->middleware(['auth', 'verified']);

Route::any('/payment/return/{item}', [PaymentController::class, 'paymentReturn'])->name('payment.return');
Route::any('/payment/cancel/{item}', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::any('/payment/success/{item}', [PaymentController::class, 'success'])->name('payment.success');
Route::any('/payment/failed/{item}', [PaymentController::class, 'failed'])->name('payment.failed');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/ratings', AdminRatingController::class);
    Route::resource('/items', AdminItemController::class);
});

Route::resource('/ratings', RatingController::class)->middleware(['auth', 'verified']);
Route::resource('/profiles', ProfileController::class)->middleware(['auth', 'verified']);

Route::resource('/items', SellerItemController::class)->middleware(['auth', 'verified']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google-auth');

Route::get('/auth/callback', [GoogleController::class, 'calllbackGoogle']);


Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github-auth');

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where('email', $githubUser->email)->first();

    if (!$user) {
        $new_user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,

        ]);

        Auth::login($new_user);

        return redirect()->intended('/');
    } else {
        Auth::login($user);

        return redirect()->intended('/');
    }
});

require __DIR__.'/auth.php';
