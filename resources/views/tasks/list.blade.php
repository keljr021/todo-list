<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>List of Tasks</title>
      <link rel="stylesheet" href="{{{ URL::asset('css/app.css')}}}" />
      <script type="text/javascript" src="{{{ URL::asset('js/app.js')}}}"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="{{{ URL::asset('js/list.js')}}}"></script>
    </head>
    <body>
      <div class="container-fluid">
        <h3>List of Tasks</h3>

        <div class="tablebox">
          <table class="table table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th>&nbsp;</th>
                <th>Title</th>
                <th>Priority</th>
                <th>Created By</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
              <tr data-id="{{ $task->id }}">
                <td>
                  <input type="checkbox" value="true" {{ ($task->is_completed) ? 'checked' : '' }} />
                </td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->priority_ids }}</td>
                <td>{{ $task->created_at }}</td>
                <td>
                  <button type="button" class="btn btn-outline-secondary btn-sm editBtn">Edit</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm deleteBtn">Delete</button>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>

        <div>
          <button class="btn btn-outline-secondary addBtn">+ Add</button>
        </div>

      </div>
    </body>
</html>
