<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }
}

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('public/images');
    }

    $validated['user_id'] = Auth::id();

    Article::create($validated);

    return redirect()->route('home')->with('success', 'Articolo pubblicato con successo!');
}
