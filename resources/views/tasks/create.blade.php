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
        <h1>Create Task</h1>
        <form method="POST" action="/tasks">

          {{ csrf_field() }}

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body"></textarea>
          </div>

          <label>Priority</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="priority[]" value="1"> Urgent
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="priority[]" value="2"> Important
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="priority[]" value="3"> Optional
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="priority[]" value="4"> Ignore
            </label>
          </div>
          <br />

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </body>
</html>
