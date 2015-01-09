<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>forum.laravel</title>
        <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.0.1/semantic.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="ui segment">
            @if (Auth::check())
                <div style="float:right;">
                    Hello, {{{Auth::user()->username}}}.
                    <a href="{{url('logout')}}" class="ui tiny purple button">logout</a>
                </div>
            @else
                <div style="float:right;">
                <a href="{{url('login')}}" class="ui tiny green button">login</a>
                <a href="{{url('register')}}" class="ui tiny green button">register</a>
                </div>
            @endif
            @yield('header')
        </div>
        <div style="width: 50%; margin: 0 auto;">
            @yield('content')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.0.1/semantic.min.js"></script>
        @yield('scripts')
    </body>
</html>