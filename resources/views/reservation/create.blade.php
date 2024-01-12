@extends('layouts.main')

@section('content')

<form action="{{ route('reservation.store') }}" method="post">
    @csrf
    <label for="users">Users</label>
    <select name="id_users" id="id_users">
        <option value="">Veuillez choisir un utilisateur</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <label for="id_schedules">Id schedules</label>
    <select name="id_schedules" id="id_schedules">
        <option value="">Veuillez choisir un horaire</option>
        @foreach ($schedules as $schedule)
            <option value="{{ $schedule->id }}">{{ $schedule->start_hour }}</option>
        @endforeach
    </select>
    <button type="submit">Ajouter</button>  
</form>