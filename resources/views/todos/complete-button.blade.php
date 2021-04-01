@if($todo->completed)
    <span  onclick="event.preventDefault();document.getElementById('form-incomplete{{$todo->id}}').submit();"
          class="fas fa-check px-2 " style="color: limegreen;cursor: pointer;"></span>
    <form id="{{'form-incomplete'.$todo->id}}" style="display:none" action="{{route('todo.incomplete',$todo->id)}}"
          method="post">
        @csrf
        @method('put')
    </form>
@else
    <span  onclick="event.preventDefault();document.getElementById('form-complete{{$todo->id}}').submit();"
          class="fas fa-check px-2 " style="color: grey;cursor: pointer;"></span>
    <form id="{{'form-complete'.$todo->id}}" style="display:none" action="{{route('todo.complete',$todo->id)}}"
          method="post">
        @csrf
        @method('put')
    </form>
@endif
