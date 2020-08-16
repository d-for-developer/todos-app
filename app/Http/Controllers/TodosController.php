<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;

class TodosController extends Controller
{
    //

    public function index(){

        return view('todos.index')->with('todos', Todos::all());


    }


    public function show(Todos $todo)
    {

        return view('todos.show')->with('todo', $todo);
    }


    public function create(){

        return view('todos.create');
    }


    public function store(){
            
        $this->validate(request(),[

            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);


        $data =  request()->all();
        $todo = new Todos();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();
        session()->flash('success', 'Todo Created Successfully');

        return redirect('/todos');

    }


    public function edit(Todos $todo)
    {
        return view('todos.edit')->with('todo', $todo);

    }

    public function update(Todos $todo)
    {     
        
        $this->validate(request(),[

        'name' => 'required|min:6|max:12',
        'description' => 'required'
         ]);

         $data = request()->all();

         $todo->name = $data['name'];
         $todo->description = $data['description'];

         $todo->save();
         session()->flash('success', 'Todo Updated Successfully');

         return redirect('/todos');

    }


    public function destroy(Todos $todo)
    {
        $todo->delete();
        session()->flash('success', 'Todo Deleted Successfully');

        return redirect('/todos');
    }

    public function completed(Todos $todo)
    {
        $todo->completed = true;
        $todo->save();
        session()->flash('success', 'Todo Completed Successfully');

        return redirect('/todos');


    }
}

