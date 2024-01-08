@extends('layouts.main')

@section('content')


<body>
    <h1>
        Create Training
    </h1>
    <form action="{{route('training.update', ['id' => $training->id])}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{$training->name}}">
        </div>
        <br>
        <div class="mb-3">
            <label for="length">Length</label>
            <input type="number" name="length" id="length" value="{{$training->length}}">
        </div>
        <br>
        <div class="mb-3">
            <label for="max_people">Max people</label>
            <input type="number" name="max_people" id="max_people" value="{{$training->max_people}}">
        </div>
        <br>
        <div class="mb-3 form-check">
            <label for="Type">Type</label>
            <input type="radio" name="type" id="adulte" value="adulte" {{ $training->type =="adulte" ? 'checked' : '' }}>
            <label for="adulte">Adulte</label>
            <input type="radio" name="type" id="enfant" value="enfant" {{ $training->type =="enfant" ? 'checked' : '' }}>
            <label for="enfant">Enfant</label>
        </div>
        <br>
        <button type="submit">Save</button>
    </form>
</body>

</html>