<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Relazione: una categoria ha molti articoli.
     */
    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class);
    }
}
