<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LinkController;
use App\Http\Middleware\UserTokenSecure;
use Illuminate\Support\Facades\Route;

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
    return view('register');
})->name('start');

Route::post('/register', [AccountController::class, 'create'])->name('user.register');
Route::get('/link', [LinkController::class, 'index'])->name('link');
Route::group([
    'middleware' => [
        UserTokenSecure::class
    ],
], function () {
    Route::get('/account/{token}', [AccountController::class, 'show'])->name('account');
    Route::get('/account/{token}/game', [GameController::class, 'index'])->name('account.game');
    Route::get('/account/{token}/history', [HistoryController::class, 'index'])->name('account.history');
    Route::get('/account/{token}/link-refresh', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account/{token}', [AccountController::class, 'delete'])->name('account.delete');
});
