<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CardController::class, 'create'])->name('create');
Route::post('/store', [CardController::class, 'store'])->name('store');
Route::get('/show/{id}', [CardController::class, 'show'])->name('show');

