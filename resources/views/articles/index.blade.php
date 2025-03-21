@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tutti gli articoli</h1>

        @forelse($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $article->title }}</h3>
                    <h5 class="card-subtitle mb-2 text-muted">{{ $article->subtitle }}</h5>
                    <p class="mt-2">{{ \Illuminate\Support\Str::limit($article->body, 150) }}</p>
                    <p class="mb-1">
                        <strong>Categoria:</strong> {{ $article->category->name }}
                    </p>
                    <p class="mb-2">
                        <strong>Autore:</strong>
                        <a href="{{ route('author.show', $article->user) }}">{{ $article->user->name }}</a>
                    </p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Leggi di più</a>
                </div>
            </div>
        @empty
            <p>Nessun articolo disponibile.</p>
        @endforelse

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
