<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Aulab Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">The Aulab Post</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrati</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Benvenuto su The Aulab Post</h1>

        <h2 class="mb-3">Ultimi articoli</h2>

        @forelse($articles as $article)
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $article->title }}</h3>
                    <h5 class="card-subtitle mb-2 text-muted">{{ $article->subtitle }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($article->body, 150) }}</p>
                    <p class="mb-1"><strong>Categoria:</strong> {{ $article->category->name }}</p>
                    <p class="mb-2"><strong>Autore:</strong> {{ $article->user->name }}</p>
                    <a href="#" class="btn btn-primary">Leggi di più</a>
                </div>
            </div>
        @empty
            <p>Nessun articolo pubblicato al momento.</p>
        @endforelse
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
