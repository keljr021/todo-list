<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>List of Tasks</title>
      <link rel="stylesheet" href="{{{ URL::asset('css/app.css')}}}" />
      <script type="text/javascript" src="{{{ URL::asset('js/app.js')}}}"></script>
    </head>
    <body>
      <div class="container">
        <h3>List of Tasks</h3>

        <div class="tablebox">
          <table class="table table-responsive table-hover table-striped">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Priority</th>
              <th>Completed?</th>
              <th>Created By</th>
              <th>&nbsp;</th>
            </tr>
            @foreach($tasks as $task)
              <tr data-id="{{ $task->id }}">
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->priority_ids }}</td>
                <td>
                  <input type="checkbox" value="true" {{ ($task->is_completed) ? 'checked' : '' }} />
                </td>
                <td>{{ $task->created_at }}</td>
                <td>[buttons here]</td>
              </tr>
            @endforeach
          </table>
        </div>

        <div>
          <button class="button">+ Add</button>
        </div>

      </div>
    </body>
</html>
