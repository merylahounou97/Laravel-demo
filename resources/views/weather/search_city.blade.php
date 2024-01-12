@extends('layouts.main')

@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search city</title>
</head>

<body>
    <form action="{{ route('weather.list_city') }}" method="POST">
        @csrf
        <label for="city">City</label>
        <input type="text" name="city" id="city">
        <!-- <input type="text" name="city" id="city" autocomplete="$_GET"> -->
        <button type="submit">Search</button>
</body>

</html>