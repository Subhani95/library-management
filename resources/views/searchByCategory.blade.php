
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
    <form class="form-inline col-lg-12" action="{{route("searchByCategory")}}"method="post">
        @csrf
        <div class="input-group mb-3"> <input type="text" class="form-control" name="search" type="search" placeholder="Search" autocomplete="off" >
            <div class="input-group-append"><button class="btn btn-primary" type="submit" id="search-box" name="search-box"><i class="fas fa-search"></i></button></div>
        </div>
    </form>
    <br/>
        <table id="book">
@if(!empty($search[0]))
            <tr>
                <th>id</th>
                <th>Borrower Name</th>
                <th>Borrower Email</th>
                <th>Borrower Phone </th>
                <th>Borrower Address</th>
                <th>Book Category</th>
                <th>Book Name</th>
            </tr>
            @foreach($search[0]->book as $key=>$data)

                @if(!empty($data['borrower']))
                <tr>
{{--                    <td>{{$data}}</td>--}}
                    <td>{{$key+1}}</td>
                    <td>{{$data['borrower']['name']}}</td>
                    <td>{{$data['borrower']['email']}}</td>
                    <td>{{$data['borrower']['phone']}}</td>
                    <td>{{$data['borrower']['address']}}</td>
                    <td>{{$search[0]->title}}</td>
                    <td>{{$data->title}}</td>
                </tr>
                @endif
            @endforeach
            @else
    <tr>
        <td>Search Category</td>
    </tr>
            @endif
        </table>
{{--    {{ $search->links() }}--}}
{{--        <div class="d-flex justify-content-center">--}}
{{--            {{$search->links()}}--}}
{{--        </div>--}}
        <style>
            .w-5{
                display: none;
            }
        </style>

    @endsection
</body>
</html>

