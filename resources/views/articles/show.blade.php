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
    </div>
@endsection
