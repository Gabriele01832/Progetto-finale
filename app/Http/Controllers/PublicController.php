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
