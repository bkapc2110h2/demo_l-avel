<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets')}}/css/style.css">
    @yield('css')
</head>

<body>
    <header>
        
        <div class="container logo">
            <img src="{{url('assets')}}/images/logo.png" width="100">
        </div>
        
    </header>
    <nav class="navbar navbar-inverse">

        <div class="container">
            <a class="navbar-brand" href="#">Title</a>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('home.index')}}">Home</a>
                </li>
                <li>
                <a href="{{route('home.about')}}">About</a>
                </li>
                <li>
                <a href="{{route('category.index')}}">Category</a>
                </li>
            </ul>
        </div>

    </nav>

    
    <div class="container">

        @if (Session::has('no'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('no')}}!</strong>
        </div>
        @endif

        @if (Session::has('yes'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('yes')}}!</strong>
        </div>
        @endif

        @yield('main')
    </div>
    

    <footer class="bg-primary">
        <div class="container">
            <h2>Footr</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo error vitae, consectetur, distinctio iusto est animi impedit porro totam atque dolores. Odit consequatur harum eaque totam vel, aut dolores corporis.</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @yield('js')
    
</body>

</html>