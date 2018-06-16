<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index() {

      $tasks = Task::all();

      return view('tasks.list', compact('tasks'));

    }

    public function view(Task $task) {
      return view('tasks.item', compact('task'));
    }
}
