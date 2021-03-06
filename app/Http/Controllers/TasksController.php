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
      $priority = Priority::all();

      //Loop through each task
      foreach($tasks as $task) {

        //Decode priority IDs as an array
        $priority_ids = ($task->priority_ids && $task->priority_ids != 'null') ? json_decode($task->priority_ids) : [];

        //If exists, go through and check each ID
        if (count($priority_ids) > 0) {

          //Sets an empty array
          $priority_array = [];

          //For each priority ID, find the priority in the DB
          foreach($priority_ids as $pid) {
            $target = Priority::find($pid);

            //Add record information to the priority array
            array_push($priority_array, $target);

          }

          //Add to task as a new property
          $task->priorities = $priority_array;

        }

      }

      return view('tasks.list', compact('tasks'));

    }

    //Shows a list of all tasks
    public function sort($type, $sort) {

      if ($sort == 'asc') {
        $tasks = Task::all()->sortBy($type);
      }
      else if ($sort == 'desc') {
        $tasks = Task::all()->sortByDesc($type);
      }
      else {
        $tasks = Task::all();
      }

      $priority = Priority::all();

      //Loop through each task
      foreach($tasks as $task) {

        //Decode priority IDs as an array
        $priority_ids = ($task->priority_ids && $task->priority_ids != 'null') ? json_decode($task->priority_ids) : [];

        //If exists, go through and check each ID
        if (count($priority_ids) > 0) {

          //Sets an empty array
          $priority_array = [];

          //For each priority ID, find the priority in the DB
          foreach($priority_ids as $pid) {
            $target = Priority::find($pid);

            //Add record information to the priority array
            array_push($priority_array, $target);

          }

          //Add to task as a new property
          $task->priorities = $priority_array;

        }

      }

      return view('tasks.list', compact('tasks','type','sort'));

    }

    public function edit($id) {

        $task = Task::find($id);
        $priority = Priority::all();

        return view('tasks.edit', compact('task','priority'));

    }

    public function add() {

      $priority = Priority::all();

      return view('tasks.add', compact('priority'));

    }

    public function addTask(Request $request) {

      //Validate the request first
      $request->validate([
        'title' => 'required|max:100',
        'body'  => 'required',
      ]);

      //Creates a new task using request information and saves to database
      Task::create([
        'title'        => request('title'),
        'body'         => request('body'),
        'priority_ids' => ($request->has('priority')) ? json_encode(request('priority')) : null,
      ]);

      //Retrun to tasks list
      return redirect('/tasks');
    }

    public function updateTask(Request $request) {

      //Validate the request first
      $request->validate([
        'title' => 'required|max:100',
        'body'  => 'required',
      ]);

      //Updates the task based on task id
      $task = Task::find(request('id'));

      $task->title = request('title');
      $task->body = request('body');
      $task->priority_ids = ($request->has('priority')) ? json_encode(request('priority')) : null;

      //Save to the database
      $task->save();

      //Return to tasks list
      return redirect('/tasks');

    }

    public function toggleCompleteTask($id, $complete) {

      $task = Task::find($id);

      $task->is_completed = $complete;

      $task->save();
    }

    public function deleteTask($id) {

      //Deletes the task by the id
      $task = Task::find($id);
      $task->delete();

    }


}
