<html>
    <head>
        <script src="{{asset('js/app.js')}}"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>

        <div class="header">
            @section('header')
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="/home">Reminder App</a>
                    </div>
                    <ul class="nav navbar-nav">
                    <li><a href="login">Login</a></li>
                    <li><a href="create">Create account</a></li>
                    <li><a href="logout">logout</a></li>
                    </ul>
                </div>
            </nav>
            @show
        </div>
        <div class="content">
            @section('content')
            <h1>content</h1>
            @show
        </div>
        <div class="footer" style="margin:20px">
            @section('footer')
            <button><a href="{{ url()->previous() }}" class="btn btn-link">{{ __('back') }}</a></button>
            <div style="text-align:right">
                <a href="{{ url('/logout') }}" >logout</a>
            </div>
            @show
        </div>

    </body>
</html>