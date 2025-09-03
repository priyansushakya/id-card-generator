<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/check', [LoginController::class, 'check'])->name('check');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');

// Protected Admin Routes (with middleware)
Route::middleware([AuthMiddleware::class])->group(function () {
Route::get('/create', [CardController::class, 'create'])->name('create');
Route::get('/layout', [CardController::class, 'layout'])->name('layout');
Route::post('/store', [CardController::class, 'store'])->name('store');
Route::get('/show/{id}', [CardController::class, 'show'])->name('show');
});

