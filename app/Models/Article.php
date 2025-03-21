<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image',
        'category_id',
        'user_id'
    ];

    /**
     * Relazione con la categoria
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relazione con l'utente autore
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
