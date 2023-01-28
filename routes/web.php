<?php

use App\Http\Controllers\Account\AccountAboutController;
use App\Http\Controllers\Account\AccountAvatarController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\AccountInterestController;
use App\Http\Controllers\Account\AccountLookingController;
use App\Http\Controllers\Account\AccountMediaController;
use App\Http\Controllers\Account\AccountPhysicalController;
use App\Http\Controllers\Account\AccountPictureController;
use App\Http\Controllers\Avatar\AvatarUploadController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PageController::class, 'welcome']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('/account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('dashboard');
        Route::patch('/about', [AccountAboutController::class, 'update'])->name('account.update.about');
        Route::patch('/looking', [AccountLookingController::class, 'update'])->name('account.update.looking');
        Route::patch('/interest', [AccountInterestController::class, 'update'])->name('account.update.interest');
        Route::patch('/physical', [AccountPhysicalController::class, 'update'])->name('account.update.physical');
        Route::post('/avatar', [AccountAvatarController::class, 'update'])->name('account.upload.avatar');
        Route::post('/media', [AccountMediaController::class, 'store'])->name('account.store.media');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
