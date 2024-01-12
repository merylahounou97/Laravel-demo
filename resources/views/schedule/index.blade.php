@extends('layouts.main')

@section('content')

<header>
    <h1>Créneaux</h1>
    <a href="{{ route('schedule.create') }}">Ajouter un créneau</a>
</header>

<table>
    <tr>
        <th>Id</th>
        <th>Id trainings</th>
        <th>Heure de début</th>
        <th>Heure de fin</th>
        <th>Actions</th>
    </tr>
    @foreach ($schedules as $schedule)
        <tr>
            <td>{{ $schedule->id }}</td>
            <td>{{ $schedule->id_trainings }}</td>
            <td>{{ $schedule->start_hour }}</td>
            <td>{{ $schedule->end_hour }}</td>
            <td>
                <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('schedule.destroy', $schedule->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
