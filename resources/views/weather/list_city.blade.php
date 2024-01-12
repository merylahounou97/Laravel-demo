@extends('layouts.main')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste villes</title>
</head>

<body>
    <p>Les villes correspondates à votre recherche sont :</p>
    <div>

        @foreach($list['cities'] as $city)
        <ul>
            <li>
                <a href="{{ route('weather.index_bis', ['insee' => $city['insee']]) }}">{{$city['name']}}</a>
            </li>
            <!-- <form action="{{ route('weather.index_bis') }}" method="POST">
                @csrf
                <li>{{ $city['name'] }}</li>
                <input type="number" name="insee" id="insee" value="{{ $city['insee'] }}">
                <button type="submit">Voir</button>-->
        </ul>

        @endforeach
    </div>
</body>

</html>