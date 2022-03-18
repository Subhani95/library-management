
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
</head>
<style>
    h2{
        text-align: center;
    }
    #book {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 80%;
        border:2px solid black;
        margin-left:auto;
        margin-right:auto;
        justify-content: center;

    }

    #book td, #book th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }

    #book tr:nth-child(even){background-color: #f2f2f2;}

    #book tr:hover {background-color: #ddd;}

    #book th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #8e9693;
        color: white;
        text-align: center;
        vertical-align: middle;

    }
</style>
<body>
@extends('admin')
@section('content')
    <br/>
    <table id="book">
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
{{--        @if ($search->count() == 0)--}}
{{--            <tr>--}}
{{--                <td colspan="5">Nothing To Display</td>--}}
{{--            </tr>--}}
{{--        @endif--}}
        <tr>
            <th>ID</th>
            <th>Borrower Name</th>
            <th>Borrower Email</th>
            <th>Borrower Phone </th>
            <th>Borrower Address</th>
            <th>Borrowered Book</th>
        </tr>
        @foreach($search as $data)
            <tr>
                                <td>{{$data->newBook}}</td>
                                <td>{{$borrower['name']}}</td>
                                <td>{{$borrower['email']}}</td>
                                <td>{{$borrower['phone']}}</td>
                                <td>{{$borrower['address']}}</td>
                                <td>{{$borrower->book->title}}</td>
            </tr>
        @endforeach
    </table>
    {{--    @endif--}}

    {{--    <div class="d-flex justify-content-center">--}}
    {{--        {{$borrowers->links()}}--}}
    {{--    </div>--}}
    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection
</body>
</html>

