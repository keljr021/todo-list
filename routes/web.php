<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Task;

//List of tasks Page
Route::get('/tasks', 'TasksController@index');

//Add New Task Page
Route::get('/tasks/create', 'TasksController@create');



//Save a new Task
Route::post('tasks/', 'TasksController@addTask');

//Update a Task
Route::post('tasks/update', 'TasksController@updateTask');

//Delete a Task
Route::get('tasks/{id}/delete', 'TasksController@deleteTask');

//Edit Task Page
Route::get('tasks/{id}/edit', 'TasksController@edit');

Route::get('tasks/{id}/{complete}/complete', 'TasksController@toggleCompleteTask');

//Sort task Page
Route::get('tasks/{type}/{sort}/sort', 'TasksController@sort');
