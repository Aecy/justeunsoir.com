<?php

use App\Http\Controllers\Account\AccountAboutController;
use App\Http\Controllers\Account\AccountAvatarController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\AccountCoverController;
use App\Http\Controllers\Account\AccountInformationController;
use App\Http\Controllers\Account\AccountInterestController;
use App\Http\Controllers\Account\AccountLookingController;
use App\Http\Controllers\Account\AccountMediaController;
use App\Http\Controllers\Account\AccountPhysicalController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminQuestionController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Conversation\ConversationController;
use App\Http\Controllers\Conversation\MessageController;
use App\Http\Controllers\Favorite\FavoriteController;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\Reward\RewardController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\Shop\PaypalController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\StripeController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/faq', [QuestionController::class, 'index'])->name('faq');

Route::middleware(['auth', 'verified', 'account.completed'])->group(function () {
    Route::prefix('tarifs')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('shop.index');

        Route::prefix('stripe')->group(function () {
            Route::post('/{product}', [StripeController::class, 'checkout'])->name('stripe.checkout');
            Route::get('done', [StripeController::class, 'success'])->name('stripe.success');
            Route::get('cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
        });

        Route::prefix('paypal')->group(function () {
            Route::post('/{product}', [PaypalController::class, 'checkout'])->name('paypal.checkout');
            Route::get('status', [PaypalController::class, 'status'])->name('paypal.status');
        });
    });

    Route::prefix('conversations')->group(function () {
        Route::get('/', [ConversationController::class, 'index'])->name('conversations.index');
        Route::get('/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
        Route::delete('/{conversation}', [ConversationController::class, 'delete'])->name('conversations.delete');
        Route::post('/{conversation}/message', [MessageController::class, 'store'])->name('messages.store');
    });

    Route::prefix('membres/{user}')->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('users.show');
        Route::get('/favoris', [FavoriteController::class, 'show'])->name('favorites.show');
        Route::get('/photos', [MediaController::class, 'show'])->name('medias.show');
        Route::get('/conversation', [ConversationController::class, 'store'])->name('conversations.store');

        Route::prefix('toggle')->group(function () {
            Route::get('/like', [LikeController::class, 'index'])->name('users.like');
            Route::get('/favoris', [FavoriteController::class, 'index'])->name('users.favorite');
        });
    });

    Route::prefix('recherches')->group(function () {
        Route::get('/', [SearchController::class, 'index'])->name('search.index');
    });

    Route::prefix('/recompenses')->group(function() {
        Route::get('/', [RewardController::class, 'index'])->name('reward.index');
        Route::post('/', [RewardController::class, 'store'])->name('reward.store');
    });

    Route::prefix('/mon-compte')->withoutMiddleware('account.completed')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('dashboard');

        Route::get('securiter', [AccountController::class, 'security'])->name('account.security');
        Route::get('favoris', [AccountController::class, 'favorites'])->name('account.friends');
        Route::get('medias', [AccountController::class, 'medias'])->name('account.medias');

        Route::delete('/', [AccountController::class, 'destroy'])->name('account.delete');
        Route::patch('/information', [AccountInformationController::class, 'update'])->name('account.update.information');
        Route::patch('/about', [AccountAboutController::class, 'update'])->name('account.update.about');
        Route::patch('/looking', [AccountLookingController::class, 'update'])->name('account.update.looking');
        Route::patch('/interest', [AccountInterestController::class, 'update'])->name('account.update.interest');
        Route::patch('/physical', [AccountPhysicalController::class, 'update'])->name('account.update.physical');

        Route::post('/avatar', [AccountAvatarController::class, 'update'])->name('account.upload.avatar');
        Route::post('/cover', [AccountCoverController::class, 'update'])->name('account.upload.cover');
        Route::post('/media', [AccountMediaController::class, 'store'])->name('account.store.media');
    });

    Route::middleware('admin')->prefix('control-admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::prefix('foire-aux-questions')->group(function () {
            Route::get('/', [AdminQuestionController::class, 'index'])->name('admin.question.index');
            Route::post('/', [AdminQuestionController::class, 'store'])->name('admin.question.store');
            Route::get('/{question}/modifier', [AdminQuestionController::class, 'edit'])->name('admin.question.edit');
            Route::get('/creer', [AdminQuestionController::class, 'create'])->name('admin.question.create');
            Route::patch('/{question}', [AdminQuestionController::class, 'update'])->name('admin.question.update');
            Route::delete('/{question}', [AdminQuestionController::class, 'delete'])->name('admin.question.delete');
        });

        Route::prefix('utilisateurs')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
            Route::get('/achats', [AdminUserController::class, 'buy'])->name('admin.user.buy');
        });

        Route::prefix('packs')->group(function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('admin.product.index');
            Route::get('/{product}/modifier', [AdminProductController::class, 'edit'])->name('admin.product.edit');
            Route::patch('/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
            Route::delete('/{product}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
            Route::post('/', [AdminProductController::class, 'store'])->name('admin.product.store');
            Route::get('/creer', [AdminProductController::class, 'create'])->name('admin.product.create');
        });
    });
});

require __DIR__ . '/auth.php';
