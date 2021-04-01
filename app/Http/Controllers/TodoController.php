<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodocreateRequest;
use App\Models\Todo;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{


    function index()
    {
        $todo = auth()->user()->todos->sortBy('completed');  //sortBy for collection
//        $todo=auth()->user()->todos()->('completed')->get(); //orderBy for array
//        $todo = Todo::orderBy('completed')->get();
        return view('todos.index')->with(['todos' => $todo]);
    }

    function create()
    {
        return view('todos.create');
    }

    function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with(['todos' => $todo]);
    }

    function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->update(['title' => $request->title, 'description' => $request->description]);
        return redirect('/todos')->with('message', 'Updated Todo!');
    }

    function store(TodocreateRequest $request)
    {
//        $request->validate([
//           'title'=> 'required|max:255'
//        ]);
//        $rules=[
//            'title'=> 'required|max:255',
//        ];
//        $validator = Validator::make($request->all(), $rules, $messages = [
//            'title.max' => 'Tittle accepts only 255 characters.',
//        ]);
//        if($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }


//        $new = new Todo();
//        $new->title = $request->title;
//        $new->save();
//        dd(auth()->user()->todos());
//        dd($request->all());
        $todo= auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach ($request->step as $step){
                $todo->steps()->create(['name'=>$step]);
            }
        }


        return redirect('/todos')->with('message', 'Todo Created Successfully');
    }

    function complete(Request $request, $id)
    {
        $new = Todo::find($id);
        $new->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Completed!');
    }

    function incomplete(Request $request, $id)
    {
        $new = Todo::find($id);
        $new->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task In-Complete!');
    }

    function delete(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted!');
    }

    function show(Request $request, $id)
    {
        $todo = Todo::find($id);
        return view('todos.show', compact('todo'));
    }
}
