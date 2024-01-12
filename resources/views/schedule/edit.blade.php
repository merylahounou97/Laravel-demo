@extends('layouts.main')

@section('content')

<form  action="{{ route('schedule.update', $schedule->id) }}" method="post">
    @csrf
    {{-- @method('PUT') --}}
    <label for="trainings">Trainings</label>
    <input type="text" name="id_trainings" id="id_trainings" value="{{ $schedule->id_trainings }}">
    <label for="start_hour">Heure de début</label>
    <input type="datetime-local" name="start_hour" id="start_hour" value="{{ $schedule->start_hour }}">
    <label for="end_hour">Heure de fin</label>
    <input type="datetime-local" name="end_hour" id="end_hour" value="{{ $schedule->end_hour }}">
    <button type="submit">Modifier</button>
</form>