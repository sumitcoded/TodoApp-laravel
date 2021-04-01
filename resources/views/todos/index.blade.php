@extends('todos.layout')
@section('content')

    <div class=" card p-2" style="max-width: 500px; margin: 100px auto">
        <div class="border-bottom d-flex justify-content-around">
            <h3 class="p-1">Todo List</h3>
            <a href="/todos/create" class="p-1 float-right" style="cursor: pointer;"><span
                    class="fas fa-plus-circle fa-2x"></span></a>
        </div>
        <x-alert></x-alert>
        @forelse($todos as $todo)

            <ul class="my-4">
                <li class="d-md-flex justify-content-between">
                    <div>
                        @include('todos.complete-button')
                    </div>
                    @if($todo->completed)
                        <a href="{{route('todo.show',$todo->id)}}" style="cursor: pointer;" class="text-decoration-line-through"
                           >{{$todo->title}}</a>
                    @else
                        <a href="{{route('todo.show',$todo->id)}}" style="cursor: pointer; " >{{$todo->title}}</a>
                    @endif

                    <div>

                        <a href="{{'/todos/edit/'.$todo->id}}" style="cursor: pointer; color: darkorange"
                           class="mx-2 float-right">
                            <span class="fas fa-pen px-2 "></span></a>

                        <span onclick="event.preventDefault();
                            if(confirm('are you sure?')){
                            document.getElementById('form-delete{{$todo->id}}').submit();}"

                              class="fas fa-times px-2 " style="color: red;cursor: pointer;"></span>
                        <form id="{{'form-delete'.$todo->id}}" style="display:none"
                              action="{{route('todo.delete',$todo->id)}}" method="post">
                            @csrf
                            @method('put')
                        </form>

                    </div>


                </li>
            </ul>
        @empty
            <p>No tasks available, create one.</p>
        @endforelse

    </div>
@endsection
