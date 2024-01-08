@extends('layouts.main')

@section('content')

<div class="container text-center">
    <div class="row">
        <h1>
            TRAININGS
        </h1>
    </div>
</div>



<ul class="list-group">
    <div class="container text-center">
        <div class="row">
            <div class="row justify-content-around">
                @foreach ($trainings as $training)
                <div class="col-4">
                    <img src="https://ai-previews.123rf.com/ai-variation/preview/wm/weststudio/weststudio1612/weststudio161200003_1.jpg" class="img-thumbnail" alt="...">
                    <li class="list-group-item list-group-item-primary">{{"Name: ".$training->name}}</li>
                    <li class="list-group-item list-group-item-secondary">{{"Length: ".$training->length}}</li>
                    <li class="list-group-item list-group-item-success">{{"Max people: ".$training->max_people}}</li>
                    <li class="list-group-item list-group-item-danger">{{"Type: ".$training->type}}</li>
                    <a href="{{route('training.edit', ['id' => $training->id])}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('training.destroy', ['id' => $training->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</ul>