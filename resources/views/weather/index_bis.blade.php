@inject('carbon', 'Carbon\Carbon')

@extends('layouts.main')

@section('content')

<body>
    <p>La météo de {{ $weather['city']['name'] }} est :</p>
    <!-- {{$weather}} -->
    <div>
        @foreach($weather['forecast'] as $day)
        <p>Le {{ $carbon::parse($day['datetime'])->format('d/m/Y') }} : {{ $day['tmin'] }}°C - {{ $day['tmax'] }}°C</p>
        @endforeach
    </div>
</body>

</html>