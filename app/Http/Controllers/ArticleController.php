<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Mostra tutti gli articoli
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Mostra il form di creazione articolo
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Salva un nuovo articolo
     */
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

    /**
     * Mostra il dettaglio di un articolo
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Mostra il form di modifica articolo
     */
    public function edit(Article $article)
    {
        if (Auth::id() !== $article->user_id) {
            abort(403);
        }

        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Aggiorna l'articolo
     */
    public function update(Request $request, Article $article)
    {
        if (Auth::id() !== $article->user_id) {
            abort(403);
        }

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

        $article->update($validated);

        return redirect()->route('articles.show', $article)->with('success', 'Articolo aggiornato con successo!');
    }

    /**
     * Elimina l'articolo
     */
    public function destroy(Article $article)
    {
        if (Auth::id() !== $article->user_id) {
            abort(403);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Articolo eliminato con successo.');
    }
}
