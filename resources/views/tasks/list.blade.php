
@extends('layout.master')

@section('title', 'List of Tasks')

@section('headassets')
  <script type="text/javascript" src="{{{ URL::asset('js/list.js')}}}"></script>
@endsection

@section('content')

    <div class="tablebox">
      <table class="table table-hover table-striped">
        <thead class="thead-dark">
          <tr>
            <th class="header-complete"><a href="/tasks/is_completed/{{ (isset($type) && $type == 'is_completed' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Completed</a></th>
            <th class="header-priority"><a href="/tasks/priority_ids/{{ (isset($type) && $type == 'priority_ids' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Priority</a></th>
            <th class="header-titile"><a href="/tasks/title/{{ (isset($type) && $type == 'title' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Title</a></th>
            <th class="header-date"><a href="/tasks/created_at/{{ (isset($type) && $type == 'created_at' && $sort == 'asc') ? 'desc' : 'asc' }}/sort">Created At</a></th>
            <th class="header-buttons">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
          <tr data-id="{{ $task->id }}" class="{{ ($task->is_completed) ? 'completed' : ''}}">
            <td class="row-complete">
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
            <td class="row-created">
              @php
                $time = strtotime($task->created_at);
                $date = date('M d h:i A', $time);
                echo $date;
              @endphp
            </td>
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
                <div class="modal-header {{ ($task->is_completed) ? 'completed' : '' }}">
                  <div class="modal-header-title">{{ $task->title }}</div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="modal-body-text">
                    <div class="task-body">
                      <p>{{ $task->body }}</p>
                    </div>
                    <div class="task-priority">
                      @if(isset($task->priorities))
                        @foreach ($task->priorities as $priority)

                          <span class="badge" style="background-color:{{ $priority->color }}" title="{{ $priority->description }}">{{ $priority->name }}</span>&nbsp;

                        @endforeach
                      @endif
                    </div>
                    <div>
                      <h6 class="task-created">
                        @php
                          $time = strtotime($task->created_at);
                          $date = date('M d h:i A', $time);
                          echo $date;
                        @endphp
                      </h6>
                      @if ($task->completed_at)
                        <h6 class="task-completed">
                          @php
                            $time = strtotime($task->completed_at);
                            $date = date('M d h:i A', $time);
                            echo 'Completed ' . $date;
                          @endphp
                        </h6>
                      @endif

                    </div>
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

@endsection
