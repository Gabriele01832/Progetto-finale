<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PublicController extends Controller
{
    /**
     * Mostra la homepage del sito.
     */
    public function home()
    {
        return view('welcome');
    }
}


use App\Models\Article;

public function home()
{
    $articles = Article::orderBy('created_at', 'desc')->take(5)->get();
    return view('welcome', compact('articles'));
}
