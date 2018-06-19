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
Route::post('tasks/', 'TasksController@store');

//Update a Task
Route::post('tasks/update', 'TasksController@update');

//Delete a Task
Route::get('tasks/{id}/destroy', 'TasksController@destroy');

//Edit Task Page
Route::get('tasks/{id}/edit', 'TasksController@edit');

//Sort task Page
Route::get('tasks/{type}/{sort}/sort', 'TasksController@sort');
