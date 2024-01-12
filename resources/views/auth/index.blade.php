@extends('layouts.main')

 <header> 
    <div class="container text-center">
   {{-- <div class="row"> --}}
        <h1>
            USERS
        </h1>
    {{-- </div>   --}}
</div> 
@auth
    {{-- <p>Bienvenue, {{ Auth::user()->name }}!</p> --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
    @else
    <p>Veuillez vous <a href="{{ route('login') }}">connecter</a>.</p>
    @endauth
</header>

@section('content')



<ul class="list-group">
    <div class="container text-center">
        <div class="row">
            <div class="row justify-content-around">
                @foreach ($users as $user)
                <div class="users">
                <div class="col-4">
                    <img class="profile-picture" src="{{ asset('images/'. $user->picture) }}" alt="Photo de profil">
                    <li class="list-group-item list-group-item-primary">{{"Name: ".$user->name}}</li>
                    <li class="list-group-item list-group-item-secondary">{{"Email: ".$user->email}}</li>
                    <li class="list-group-item list-group-item-success">{{"Role: ".$user->role}}</li>
                </div>
                <div id="buttons">
                    <a href="{{route('users.edit', ['id' => $user->id])}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('users.update_picture', ['id' => $user->id])}}" class="btn btn-primary">Edit pp</a>
                    <form action="{{route('users.destroy', ['id' => $user->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</ul>