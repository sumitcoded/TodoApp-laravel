@extends('todos.layout')

@section('content')
    <div class=" card text-center p-2" style="max-width: 500px; margin: 100px auto">
    <div class="border-bottom d-flex justify-content-around">
        <h3>Create New Task</h3>
        <a href="/todos" class="pt-2 float-right" style="cursor: pointer;"><span class="fas fa-arrow-left fa-2x"></span></a>
    </div>
    <div>
        <form action="/todos/create" method="post">
            <x-alert></x-alert>
            @csrf
            <div class="pt-4">
                <input type="text" name="title" id="title" placeholder="tittle">
            </div>
            <div class="pt-1">
                <textarea name="description" id="description" cols="23" rows="5" placeholder="description"></textarea>
            </div>

            <livewire:step />
            <div class="py-1">
                <input type="submit" class="btn btn-success" value="Create">

            </div>

        </form>

    </div>

    </div>
@endsection
