@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-3">{{ $article->title }}</h1>
        <h5 class="text-muted">{{ $article->subtitle }}</h5>

        @if($article->image)
            <img src="{{ Storage::url($article->image) }}" class="img-fluid my-3" alt="Immagine articolo">
        @endif

        <p class="mb-4">{{ $article->body }}</p>

        <p>
            <strong>Categoria:</strong>
            <a href="{{ route('category.show', $article->category) }}">{{ $article->category->name }}</a>
        </p>

        <p>
            <strong>Autore:</strong>
            <a href="{{ route('author.show', $article->user) }}">{{ $article->user->name }}</a>
        </p>

        <p>
            <strong>Pubblicato il:</strong> {{ $article->created_at->format('d/m/Y H:i') }}
        </p>

        <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">← Torna agli articoli</a>

        @auth
            @if(Auth::id() === $article->user_id)
                <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning mt-3 ms-2">Modifica</a>

                <form method="POST" action="{{ route('articles.destroy', $article) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-3 ms-2" onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                        Elimina
                    </button>
                </form>
            @endif
        @endauth
    </div>
@endsection
