<?php

use Illuminate\Support\Facades\Route;

// Reindirizza la homepage di Laravel al frontend
Route::get('/', function () {
    return redirect('/index.html');
});