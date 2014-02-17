<!DOCTYPE html>
<html>
  <head>
    <title>Laravel FAQ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    @yield('css', '')
    <link href="/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">Laravel FAQ</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            {{-- <li{{ Request::is('random') ? ' class="active"' : '' }}>{{ link_to_route('random', 'Un santo a caso') }}</li>
            <li{{ Request::is('today') ? ' class="active"' : '' }}>{{ link_to_route('today', 'Santi di oggi') }}</li>
            <li{{ Request::is('tomorrow') ? ' class="active"' : '' }}>{{ link_to_route('tomorrow', 'Santi di domani') }}</li> --}}
          </ul>
          <ul class="nav navbar-nav navbar-right">
            {{-- <li{{ Request::is('docs') ? ' class="active"' : '' }}>{{ HTML::link('/docs', 'API') }}</li> --}}
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          @yield('sidabar')
        </div>
        <div class="col-md-10">
          @if(Session::has('message-success'))
            <div class="alert alert-success">{{ Session::get('message-success') }}</div>
          @endif
          @if(Session::has('message-error'))
            <div class="alert alert-danger">{{ Session::get('message-error') }}</div>
          @endif
          @yield('content')
        </div>
      </div>
    </div>
    <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    @yield('js', '')
  </body>
</html>
