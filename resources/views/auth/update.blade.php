@extends('layouts.main')

@section('content')

{{-- resources/views/auth/register.blade.php --}}

<body>
    @if ($errors->has('name'))
    <span>{{ $errors->first('name') }}</span>
    @endif

    <form method="POST" action="{{ route('users.update', ['id' => $user->id])}}">
        @csrf

        <div>
            <label for="name">Nom</label>
            <input id="name" type="text" name="name" value="{{$user->name}}" required autofocus>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{$user->email}}" required>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>

        <div class="mb-3 form-check">
            <label for="role">Role</label>
            <input type="radio" name="role" id="admin" value="admin" {{ $user->role =="admin" ? 'checked' : '' }}>
            <label for="admin">Admin</label>
            <input type="radio" name="role" id="user" value="user" {{ $user->role =="user" ? 'checked' : '' }}>
            <label for="user">User</label>
        </div>

        <div>
            <button type="submit">Mettre à jour</button>
        </div>
    </form>
</body>

</html>