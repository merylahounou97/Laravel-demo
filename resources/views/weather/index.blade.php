@extends('layouts.main')

@section('content')

@inject('carbon', 'Carbon\Carbon')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
</head>

<body>
    <p>La météo de {{ $weather['city']['name'] }} est :</p>
    <div>
        @foreach($weather['forecast'] as $day)
        <p>Le {{ $carbon::parse($day['datetime'])->format('d/m/Y') }} : {{ $day['tmin'] }}°C - {{ $day['tmax'] }}°C</p>
        @endforeach
    </div>
</body>

</html>