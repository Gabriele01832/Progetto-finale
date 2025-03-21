<?php

use Illuminate\Support\Facades\Route;

// Reindirizza la homepage di Laravel al frontend
Route::get('/', function () {
    return redirect('/index.html');
});

use App\Http\Controllers\ArticleController;

Route::get('/articles/create', [ArticleController::class, 'create'])
    ->middleware(['auth'])
    ->name('articles.create');
