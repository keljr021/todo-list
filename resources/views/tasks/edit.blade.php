
@extends('layout.form')

@section('title', 'Update Task')
@section('formmethod', 'POST')
@section('formaction', '/tasks/update')

@section('formcontent')

  <input type="hidden" name="id" value="{{ $task->id }}" />

  <div class="form-group">
    <label>Priority</label>

    @foreach($priority as $p)
      <div class="form-check" title="{{ $p->description }}">
        <label class="form-check-label" style="background-color: {{ $p->color }}">
          <input type="checkbox" class="form-check-input" name="priority[]" value="{{ $p->id }}" <?= ($task->priority_ids && in_array($p->id, json_decode($task->priority_ids))) ? 'checked' : '';  ?> > {{ $p->name }}
        </label>
      </div>
    @endforeach

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" maxlength="100" value="{{ $task->title }}" required />
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" name="body" required>{{ $task->body }}</textarea>
    </div>
    <br />


  </div>

@endsection
