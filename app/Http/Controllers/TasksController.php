<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Task;
use App\Priority;

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

    public function edit($id) {

        $task = Task::find($id);
        $priority = Priority::all();

        return view('tasks.edit', compact('task','priority'));

    }

    public function create() {

      $priority = Priority::all();

      return view('tasks.create', compact('priority'));

    }

    public function store(Request $request) {

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

    public function update(Request $request) {

      //Validate the request first
      $request->validate([
        'title' => 'required|max:100',
        'body'  => 'required',
      ]);

      //Updates the task based on task id
      $task = Task::find(request('id'));

      $task->title = request('title');
      $task->body = request('body');
      $task->priority_ids = request('priority');

      //Save to the database
      $task->save();

      //Return to tasks list
      redirect('/tasks');

    }

    public function destroy($id) {

      //Deletes the task by the id
      $task = Task::find($id);
      $task->delete();

    }


}
