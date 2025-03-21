@extends('layouts.app')

@section('content')
    <h1>Registrazione</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Nome</label>
        <input type="text" name="name" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <label>Conferma Password</label>
        <input type="password" name="password_confirmation" required>
        <button type="submit">Registrati</button>
    </form>
@endsection
