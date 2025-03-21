@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Articolo</h1>

        <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Titolo</label>
            <input type="text" name="title" value="{{ $article->title }}" required>

            <label>Sottotitolo</label>
            <input type="text" name="subtitle" value="{{ $article->subtitle }}">

            <label>Testo</label>
            <textarea name="body" rows="5" required>{{ $article->body }}</textarea>

            <label>Immagine</label>
            <input type="file" name="image">

            <label>Categoria</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($article->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-success mt-3">Salva Modifiche</button>
        </form>
    </div>
@endsection
