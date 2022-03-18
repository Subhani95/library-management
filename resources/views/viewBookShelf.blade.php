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
    <title>View Category</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
</head>
<style>
    h2{
        text-align: center;
    }
    #category {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 80%;
        border:2px solid black;
        margin-left:auto;
        margin-right:auto;
        justify-content: center;

    }

    #category td, #category th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
    }

    #category tr:nth-child(even){background-color: #f2f2f2;}

    #category tr:hover {background-color: #ddd;}

    #category th {
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
    <form class="form-inline col-lg-12">
        <div class="input-group mb-3"> <input type="text" class="form-control" name="search" type="search" placeholder="Search" autocomplete="off" >
            <div class="input-group-append"><button class="btn btn-primary" type="submit" id="search-box" name="search-box"><i class="fas fa-search"></i></button></div>
        </div>
    </form>
    <table id="category">
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
        <tr>
            <th>ID</th>
            <th>Shelf Name</th>
            <th>Shelf Number</th>
            <th>Shelf Location</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($bookShelfs as $bookShelf)

            <tr>
                <td>{{$bookShelf['id']}}</td>
                <td>{{$bookShelf['name']}}</td>
                <td>{{$bookShelf['number']}}</td>
                <td>{{$bookShelf['location']}}</td>
                <td>{{$bookShelf['status'] == "a" ? "active": "delete"}}</td>
                <td>
                    @if($bookShelf->status == 'a')
                        <button type="submit"  class="btn btn-danger" onclick="changeShelfStatus({{$bookShelf->id}}, 'd')"> Delete </button>
                        <a href='{{ url("/editBookShelf/{$bookShelf->id}") }}'><span class="btn btn-info">Edit</span></a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{$bookShelfs->links()}}
    </div>
    <style>
        .w-5{
            display: none;
        }
    </style>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script>
    function changeShelfStatus(bookShelf_id, status){
        swal({
            title: "You really want to Delete",
            showCancelButton: true,
            confirmButtonText: "Delete",
            confirmButtonColor: "#ea0707",
            cancelButtonColor: "#e0e0eb",
            type:"success"
        })
            .then((result) => {
                if (result.value == true) {
                    $.ajax({
                        type: "post",
                        url: "/changeShelfStatus/bookShelf_id",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            bookShelf_id: bookShelf_id,
                            status: status
                        },
                        success: function(data, status) {
                            swal("Success", "Shelf Deleted Successfully", "success").then((value) => {
                                location.reload();
                            });
                        }
                    })
                }
            })
    }
</script>
</body>
</html>
