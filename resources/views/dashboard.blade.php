@extends('layouts.main')

@section('content')

{{-- resources/views/home.blade.php --}}


<body>
    <h1>Page d'Accueil</h1>

    @auth
    <p>Bienvenue, {{ Auth::user()->name }}!</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
    @else
    <p>Veuillez vous <a href="{{ route('login') }}">connecter</a>.</p>
    @endauth
</body>

</html>