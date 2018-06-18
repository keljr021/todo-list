<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Create Task</title>
      <link rel="stylesheet" href="{{{ URL::asset('css/app.css')}}}" />
      <script type="text/javascript" src="{{{ URL::asset('js/app.js')}}}"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
      <div class="container-fluid">
        <h1>Edit Task</h1>
        <form method="POST" action="/tasks/update">

          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $task->id }}" />

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" maxlength="100" value="{{ $task->title }}" required />
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" required>{{ $task->body }}</textarea>
          </div>

          <label>Priority</label>

          @foreach($priority as $p)
            <div class="form-check" title="{{ $p->description }}">
              <label class="form-check-label" style="background-color: {{ $p->color }}">
                <input type="checkbox" class="form-check-input" name="priority[]" value="{{ $p->id }}"> {{ $p->name }}
              </label>
            </div>
          @endforeach

          </div>
          <br />

          <div class="form-group">
            <a href="/tasks" class="btn btn-btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>

        @if(count($errors))
          <div class="form-group">
            <div class="alert alert-warning">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif

      </div>
    </body>
</html>
