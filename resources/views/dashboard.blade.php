{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <link rel="stylesheet" href=--}}
{{--    "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>library Management System</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<nav class="navbar navbar-inverse">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="navbar-header">--}}
{{--            <a class="navbar-brand" style="color: white" href="#">LMS</a>--}}
{{--        </div>--}}
{{--        <ul class="nav navbar-nav">--}}
{{--            <li class="active"><a href="#">Home</a></li>--}}
{{--            <li class="dropdown"><a class="dropdown-toggle" style="color: white" data-toggle="dropdown" href="#">Books <span class="caret"></span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li><a href="#">Tech</a></li>--}}
{{--                    <li><a href="#">Arts</a></li>--}}
{{--                    <li><a href="#">History</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li><a href="#">Page 2</a></li>--}}
{{--        </ul>--}}
{{--        <ul class="nav navbar-nav navbar-right">--}}
{{--            <li><a href="#" style="color: white"><span class="glyphicon glyphicon-user"></span> User Profile</a></li>--}}
{{--            <li><a href="{{ route('logout') }}" style="color: white"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--<div class="container">--}}
{{--    <h3>Library Management System</h3>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<body>
@extends('admin')

@section('content')
    @if(Session::get('Success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    @csrf
    <h2>Welcome to Dashboard</h2>
@endsection

</body>
</html>

