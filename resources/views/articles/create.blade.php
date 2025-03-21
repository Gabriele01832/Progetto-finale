@extends('layouts.app')

@section('content')
    <h1>Nuovo Articolo</h1>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>Titolo</label>
        <input type="text" name="title" required>

        <label>Sottotitolo</label>
        <input type="text" name="subtitle">

        <label>Testo</label>
        <textarea name="body" rows="5" required></textarea>

        <label>Immagine</label>
        <input type="file" name="image">

        <label>Categoria</label>
        <select name="category_id" required>
            <option value="">-- Seleziona categoria --</option>
            <!-- Le categorie verranno caricate dinamicamente -->
        </select>

        <button type="submit">Pubblica</button>
    </form>
@endsection
