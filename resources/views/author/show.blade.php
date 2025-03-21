@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Profilo autore: {{ $user->name }}</h1>

        @forelse($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $article->title }}</h3>
                    <h5 class="card-subtitle text-muted">{{ $article->subtitle }}</h5>
                    <p>{{ \Illuminate\Support\Str::limit($article->body, 150) }}</p>
                    <p><strong>Categoria:</strong> {{ $article->category->name }}</p>
                    <p><strong>Pubblicato il:</strong> {{ $article->created_at->format('d/m/Y') }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Leggi di più</a>
                </div>
            </div>
        @empty
            <p>L'autore non ha ancora pubblicato articoli.</p>
        @endforelse
    </div>
@endsection
