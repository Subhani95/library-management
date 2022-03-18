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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            /*background: url() no-repeat;*/
            background-size: cover;
        }

        .content {
            width: 480px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #191970;
        }

        .content h2 {
            float: left;
            font-size: 40px;
            border-bottom: 4px solid #191970;
            margin-bottom: 50px;
            padding: 13px;
        }

        .textbox {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #191970;
        }

        .fa {
            width: 50px;
            float: left;
            text-align: center;
        }

        .textbox input {
            border: none;
            outline: none;
            background: none;
            font-size: 18px;
            float: left;
            margin: 0 10px;
        }

        .buttonclass {
            width: 50%;
            padding: 8px;
            color: #ffffff;
            background: none #191970;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }

    </style>
</head>

<body>
@extends('admin')
@section('content')
    <form action="{{route("addCategory")}}" method="post" class="form_style">
        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @csrf
    <div class="content">
    <h2>YOU CAN ADD ANY CATEGORY HERE</h2>
{{--    <form action="{{ route('addCategory') }}" method="post">--}}
        <div class="textbox">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
            <input type="text" placeholder="Add Category"
                   name="title" value="" autocomplete="off">
        </div>

        <button class="buttonclass" type="submit">
            ADD</button>
    </div>
    </form>
@endsection
</body>
</html>

