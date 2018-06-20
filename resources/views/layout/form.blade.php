<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{{ URL::asset('css/app.css')}}}" />
    <script type="text/javascript" src="{{{ URL::asset('js/app.js')}}}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <title>@yield('title')</title>

    @yield('headassets')

  </head>
  <body>
    <div class="container-fluid">
      <h3 class="header">@yield('title')</h3>

      <form method=@yield('formmethod') action=@yield('formaction')>
        {{ csrf_field() }}

        @yield('formcontent')

        <br />

        <div class="form-group">
          <a href="/tasks" class="btn btn-btn-light cancelBtn">Cancel</a>
          <button type="submit" class="btn btn-primary submitBtn">Submit</button>
        </div>

      </form>

    </div>
  </body>
</html>
