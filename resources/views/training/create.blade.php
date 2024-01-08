@extends('layouts.main')

@section('content')

<body>
    <div id="content">
        <h1>
            Create Training
        </h1>
        <form action="{{route('training.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="length">Length</label>
                <input type="number" name="length" id="length">
            </div>
            <div class="mb-3">
                <label for="max_people">Max people</label>
                <input type="number" name="max_people" id="max_people">
            </div>
            <div class="mb-3 form-check">
                <label for="Type">Type</label>
                <input type="radio" name="type" id="type" value="adulte">Adulte
                <input type="radio" name="type" id="type" value="enfant">Enfant
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</body>

</html>