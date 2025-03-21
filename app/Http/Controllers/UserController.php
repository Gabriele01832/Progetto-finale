<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $articles = $user->articles()->orderBy('created_at', 'desc')->get();
        return view('author.show', compact('user', 'articles'));
    }
}
