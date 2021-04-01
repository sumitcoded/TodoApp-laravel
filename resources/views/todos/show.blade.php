@extends('todos.layout')

@section('content')
    <div class=" card text-center p-2 " style="max-width: 500px; margin: 100px auto">
        <div class="border-bottom d-flex justify-content-around">
            <h3>{{$todo->title}}</h3>
            <a href="/todos" class="p-1 float-right" style="cursor: pointer;"><span class="fas fa-arrow-left fa-2x"></span></a>
        </div>
        <div class="my-4">
            <h3>Description</h3>
            <p class="">{{$todo->description}}</p>
        </div>
        @if($todo->steps->count()>0)
            <h3>Steps for Task</h3>
            <div class="my-4">
            @foreach($todo->steps as $step)
            <p class="">{{$step->name}}</p>
            @endforeach
        </div>
        @endif

    </div>
@endsection
