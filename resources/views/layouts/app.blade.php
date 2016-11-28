<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Páginas para el proyecto de base de datos 1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="icon" href="../../favicon.ico">

    <title>(Título aquí)</title>

    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
      body {
        font-family: 'Lato';
        margin-top: 60px;
      }

      .fa-btn {
        margin-right: 8px;
      }
    </style>

  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-btn fa-bus" aria-hidden="true"></i>(Título aquí)</a>
        </div>
        <div class="collapse navbar-collapse" aria-expanded="false">
          <ul class="nav navbar-nav">
           <li {{{ (Request::is('/') ? 'class=active' : '') }}} ><a href="{{ url('/') }}">Alguna sección</a></li>
           <li {{{ (Request::is('integrantes') ? 'class=active' : '') }}} ><a href="{{ url('integrantes') }}">Otra sección para los integrantes</a></li>
           <li {{{ (Request::is('/') ? 'class=active' : '') }}} ><a href="{{ url('/') }}">Otra sección mas</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    </script>

    @yield('scripts')
  </body>
</html>
