@extends('layouts.main')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<header>
    <h1>Réservations</h1>
    <a href="{{ route('reservation.create') }}">Ajouter une réservation</a>
</header>

@section('content')

<table>
        <tr>
            <th>Id</th>
            <th>Id users</th>
            <th>Id trainings</th>
            <th>Id schedules</th>
        </tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->id_users }}</td>
                <td>{{ $reservation->id_schedules }}</td>
                <td><a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
</table>
