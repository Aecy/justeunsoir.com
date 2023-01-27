<?php

use App\Http\Controllers\Account\AccountAboutController;
use App\Http\Controllers\Account\AccountInterestController;
use App\Http\Controllers\Account\AccountLookingController;
use App\Http\Controllers\Account\AccountPhysicalController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::view('/account', 'account.index')->name('dashboard');
    Route::patch('/account/about', [AccountAboutController::class, 'update'])->name('account.update.about');
    Route::patch('/account/looking', [AccountLookingController::class, 'update'])->name('account.update.looking');
    Route::patch('/account/interest', [AccountInterestController::class, 'update'])->name('account.update.interest');
    Route::patch('/account/physical', [AccountPhysicalController::class, 'update'])->name('account.update.physical');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
