<?php

use App\Http\Controllers\Account\AccountAboutController;
use App\Http\Controllers\Account\AccountAvatarController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\AccountInterestController;
use App\Http\Controllers\Account\AccountLookingController;
use App\Http\Controllers\Account\AccountMediaController;
use App\Http\Controllers\Account\AccountPhysicalController;
use App\Http\Controllers\Favorite\FavoriteController;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reward\RewardController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('membres')->group(function () {
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/favoris', [FavoriteController::class, 'show'])->name('favorites.show');
        Route::get('/{user}/toggle/like', [LikeController::class, 'index'])->name('users.like');
        Route::get('/{user}/toggle/favoris', [FavoriteController::class, 'index'])->name('users.favorite');
    });
    Route::prefix('recherches')->group(function () {
        Route::get('/', [SearchController::class, 'index'])->name('search.index');
    });
    Route::prefix('/recompenses')->group(function() {
        Route::get('/', [RewardController::class, 'index'])->name('reward.index');
        Route::post('/', [RewardController::class, 'store'])->name('reward.store');
    });
    Route::prefix('/account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('dashboard');
        Route::get('security', [AccountController::class, 'security'])->name('account.security');
        Route::get('friends', [AccountController::class, 'friends'])->name('account.friends');
        Route::get('medias', [AccountController::class, 'medias'])->name('account.medias');
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
