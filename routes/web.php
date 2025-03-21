<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

Route::get('/', [PublicController::class, 'home'])->name('home');

// Articoli
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware(['auth'])->name('articles.create');
Route::post('/articles/store', [ArticleController::class, 'store'])->middleware(['auth'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Profili autore
Route::get('/author/{user}', [UserController::class, 'show'])->name('author.show');
