<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserRegisterController;
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
});

Route::post('/register', [UserRegisterController::class, 'create'])->name('user.register');
Route::get('/link', [LinkController::class, 'index'])->name('link');
