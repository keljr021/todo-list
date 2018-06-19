<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>List of Tasks</title>
      <link rel="stylesheet" href="{{{ URL::asset('css/app.css')}}}" />

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="{{{ URL::asset('js/app.js')}}}"></script>
      <script type="text/javascript" src="{{{ URL::asset('js/list.js')}}}"></script>
    </head>
    <body>
      <div class="container-fluid">
        <h3>List of Tasks</h3>

        <div class="tablebox">
          <table class="table table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th><a href="/tasks/is_completed/{{ (isset($type) && $type == 'is_completed' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Completed</a></th>
                <th><a href="/tasks/priority_ids/{{ (isset($type) && $type == 'priority_ids' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Priority</a></th>
                <th><a href="/tasks/title/{{ (isset($type) && $type == 'title' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Title</a></th>
                <th><a href="/tasks/created_at/{{ (isset($type) && $type == 'created_at' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Created At</a></th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
              <tr data-id="{{ $task->id }}" class="{{ ($task->is_completed) ? 'completed-row' : ''}}">
                <td class="row-checkbox">
                  <input type="checkbox" class="complete-checkbox" value="true" {{ ($task->is_completed) ? 'checked' : '' }} />
                </td>
                <td class="row-priority">
                  <span class="priority-span {{ ($task->is_completed) ? 'hide' : ''}}">

                    @if(isset($task->priorities))
                      @foreach ($task->priorities as $priority)

                        <span class="badge" style="background-color:{{ $priority->color }}" title="{{ $priority->description }}">{{ $priority->name }}</span><br />
                        <input type="hidden" class="badge-id" value="{{ $priority->id }}" />

                      @endforeach
                    @endif
                  </span>
                </td>
                <td class="row-title">{{ $task->title }}</td>
                <td class="row-created">{{ $task->created_at }}</td>
                <td class="row-buttons">
                  <span class="button-span {{ ($task->is_completed) ? 'hide' : ''}}">
                    <button type="button" class="btn btn-outline-secondary btn-sm editBtn">Edit</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm deleteBtn">Delete</button>
                  </span>
                </td>
              </tr>


              <div id="view{{ $task->id }}" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">#{{ $task->id }}: {{ $task->title }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="modal-body-text">
                        <p>{{ $task->body }}</p>
                      </div>
                      <div class="modal-body-date">
                        <p>Created {{ $task->created_at }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
