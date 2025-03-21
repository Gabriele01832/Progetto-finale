<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $articles = $category->articles()->orderBy('created_at', 'desc')->get();
        return view('category.show', compact('category', 'articles'));
    }
}
