<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Mostra la home con gli ultimi articoli.
     */
    public function home()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(5)->get();
        return view('welcome', compact('articles'));
    }
}
