@extends('layouts.main')

@section('content')

{{-- resources/views/auth/register.blade.php --}}

<body>
    @if ($errors->has('name'))
    <span>{{ $errors->first('name') }}</span>
    @endif

    <form method="POST" action="{{ route('users.update_picture', ['id' => $user->id])}}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="picture">Photo de profil</label>
            <input id="picture" type="file" name="picture" >
        </div>

        <div>
            <button type="submit">Mettre à jour</button>
        </div>
    </form>
</body>

</html>