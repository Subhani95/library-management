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

<table id="category">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($categories as $category)

<tr>
    <td>{{$category['id']}}</td>
    <td>{{$category['title']}}</td>
    <td>@if($category->status == 'a')
            Active
        @elseif ($category->status == 'b')
            block
        @elseif ($category->status == 'd')
            Delete
        @endif</td>
    <td>
    @if($category->status == 'a')
            <button type="submit"  class="btn btn-primary" onclick="changeCategoryStatus({{$category->id}}, 'b')"> Block </button>
            <button type="submit"  class="btn btn-danger" onclick="changeCategoryStatus({{$category->id}}, 'd')"> Delete </button>
    @elseif($category->status =='b')
            <button type="submit"  class="btn btn-success" onclick="changeCategoryStatus({{$category->id}}, 'a')"> Active </button>
            <button type="submit"  class="btn btn-danger" onclick="changeCategoryStatus({{$category->id}}, 'd')"> Delete </button>
    @endif
    </td>
</tr>
        @endforeach
    </table>
<div class="d-flex justify-content-center">
    {{$categories->links()}}
</div>
<style>
    .w-5{
        display: none;
    }
</style>
@endsection
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script>
    function changeCategoryStatus(category_id, status){
        swal({
            title: "You really want to Do this?",
            showCancelButton: true,
            confirmButtonText: "you SURE",
            confirmButtonColor: "#7ca3a8",
            cancelButtonColor: "#e0e0eb",
            type:"success"
        })
            .then((result) => {
                if (result.value == true) {
                    $.ajax({
                        type: "post",
                        url: "/changeCategoryStatus/category_id",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            category_id: category_id,
                            status:status
                        },
                        success: function(data, status) {
                            swal("Success", "Category Status Updated SuccessFully", "success").then((value) => {
                                location.reload();
                            });
                        }
                    })
                }
            })
    }
</script>
