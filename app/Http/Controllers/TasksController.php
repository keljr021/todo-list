<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{

    //Shows a list of all tasks
    public function index() {

      $tasks = Task::all();

      return view('tasks.list', compact('tasks'));

    }

    //View an individual task
    public function view(Task $task) {

      return view('tasks.item', compact('task'));

    }

    public function create() {

      return view('tasks.create');

    }

    public function store() {

      //Validate the request first
      $request->validate([
        'title' => 'required|max:100',
        'body'  => 'required',
      ]);

      //Creates a new task using request information and saves to database
      Task::create([
        'title'        => request('title'),
        'body'         => request('body'),
        'priority_ids' => json_encode(request('priority')),
      ]);

      //Retrun to tasks list
      redirect('/tasks');
    }

    public function destroy() {


    }


}
