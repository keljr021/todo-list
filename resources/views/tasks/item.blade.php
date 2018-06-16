<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
    </head>
    <body>
        <h3>{{ $task->title }}</h3>
        <p>{{ $task->body}}</p>
        <p>Date Created: {{ $task->created_at }}</p>
        <p>Priority: {{ json_decode($task->prirority_ids) }}</p>
    </body>
</html>
