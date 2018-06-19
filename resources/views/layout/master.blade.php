<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{{ URL::asset('css/app.css')}}}" />
    
    <script type="text/javascript" src="{{{ URL::asset('js/app.js')}}}"></script>

    @yield('headassets')

    <title>@yield('title')</title>

  </head>
  <body>
    <div class="container-fluid">
      <h3 class="header">@yield('title')</h3>

      @yield('content')
    </div>
  </body>
</html>
