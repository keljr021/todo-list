
@extends('layout.form')

@section('title', 'Add New Task')
@section('formmethod', 'POST')
@section('formaction', '/tasks')

@section('formcontent')

  <div class="form-group">
    <label>Priority</label>

    @foreach($priority as $p)
      <div class="form-check" title="{{ $p->description }}">
        <label class="form-check-label" style="background-color: {{ $p->color }}">
          <input type="checkbox" class="form-check-input" name="priority[]" value="{{ $p->id }}"> {{ $p->name }}
        </label>
      </div>
    @endforeach

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" maxlength="100" required>
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" id="body" name="body" required></textarea>
    </div>


  </div>

@endsection
