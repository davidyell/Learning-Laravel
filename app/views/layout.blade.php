<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-responsive.min.css') }}
        {{ HTML::style('css/main.css') }}

        {{ HTML::script('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header class="span12">
                    <h1>The FAQ Site!</h1>
                    <p>A test project to recreate a StackExchange site.</p>
                </header>
                <nav class='span12'>
                    <div class='navbar'>
                        <div class='navbar-inner'>
                            <ul class='nav'>
                                <li>{{ HTML::link('/', 'Home') }}</li>
                                <li>{{ HTML::link('questions/add', 'New question') }}</li>
                                
                                @if (Auth::check())
                                    <li class='dropdown'>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Account <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>{{ HTML::link('users/view/' . Auth::user()->id, 'Profile') }}</li>
                                            <li>{{ HTML::link('users/logout', 'Logout ' . Auth::user()->name) }}</li>
                                        </ul>
                                    </li>
                                @else
                                    <li class='pull-right'>{{ HTML::link('users/login', 'Login') }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="span12">
                    @yield('content')
                </div>
            </div>
        </div>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        {{ HTML::script('js/vendor/bootstrap.min.js') }}
        {{ HTML::script('js/main.js') }}
    </body>
</html>