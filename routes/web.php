<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'home'])->name('home');

// Articoli
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware(['auth'])->name('articles.create');
Route::post('/articles/store', [ArticleController::class, 'store'])->middleware(['auth'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Modifica ed eliminazione articoli (solo autore)
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware(['auth'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->middleware(['auth'])->name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->middleware(['auth'])->name('articles.destroy');

// Autore
Route::get('/author/{user}', [UserController::class, 'show'])->name('author.show');

// Categoria
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
