@extends('layouts.main')

@section('content')

<form  action="{{ route('schedule.store') }}" method="post">
    @csrf
    <label for="trainings">Trainings</label>
    <select name="id_trainings" id="id_trainings">
        <option value="">Veuillez choisir un circuit</option>
        @foreach ($trainings as $training)
            <option value="{{ $training->id }}">{{ $training->name }}</option>
        @endforeach
    </select>
    <label for="start_hour">Heure de début</label>
    <input type="datetime-local" name="start_hour" id="start_hour">
    <label for="end_hour">Heure de fin</label>
    <input type="datetime-local" name="end_hour" id="end_hour">
    <button type="submit">Ajouter</button>
</form>