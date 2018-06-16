<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    </head>
    <body>
      <h3>List of Tasks</h3>
      <ul>
      @foreach($tasks as $task)
        <li>{{ $task->id }} <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></li>
      @endforeach
    </ul>
    </body>
</html>
