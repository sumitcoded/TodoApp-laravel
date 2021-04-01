@extends('todos.layout')


@section('content')
    <div class=" card text-center p-2" style="max-width: 500px; margin: 100px auto">
        <div class="border-bottom d-flex justify-content-around">
            <h3>Update Todo List</h3>
            <a href="/todos" class="p-1 float-right" style="cursor: pointer;"><span
                    class="fas fa-arrow-left fa-2x"></span></a>
        </div>
        <div>
            <form class="" action="{{route('todo.update',$todos->id)}}" method="post">
                @csrf
                @method('patch')
                <x-alert></x-alert>
                <div class="py-1">
                    <input type="text" value="{{$todos->title}}" name="title" id="title" placeholder="tittle">
                </div>
                <div class="py-1">
                    <textarea name="description" id="description" cols="23" rows="5"
                              placeholder="description">{{$todos->description}} </textarea>
                </div>
                @livewire('editstep', ['steps' => $todos->steps])
                <div class="py-1">
                    <input type="submit" class="btn btn-success" value="Update">
                </div>

            </form>
        </div>


    </div>


@endsection
