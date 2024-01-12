@extends('layouts.main')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form  action="{{ route('reservation.update', $reservation->id) }}" method="post">
        @csrf
        {{-- @method('PUT') --}}
        <label for="id_users">Id users</label>
        <input type="text" name="id_users" id="id_users" value="{{ $reservation->id_users }}">
        <label for="id_trainings">Id trainings</label>
        <input type="text" name="id_trainings" id="id_trainings" value="{{ $reservation->id_trainings }}">
        <label for="id_schedules">Id schedules</label>
        <input type="text" name="id_schedules" id="id_schedules" value="{{ $reservation->id_schedules }}">
        <button type="submit">Modifier</button>
</body>
</html>