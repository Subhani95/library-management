
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
    <title>Listing</title>

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
{{--    <form class="form-inline col-lg-12">--}}
{{--        <div class="input-group mb-3"> <input type="text" class="form-control" name="searchCase" type="search" placeholder="Search" autocomplete="off" >--}}
{{--            <div class="input-group-append"><button class="btn btn-primary" type="submit" id="search-box" name="search-box"><i class="fas fa-search"></i></button></div>--}}
{{--        </div>--}}
{{--    </form>--}}
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
        <tr>
            <th>ID</th>
            <th>Borrower Name</th>
            <th>Borrower Email</th>
            <th>Borrower Phone </th>
            <th>Borrower Address</th>
            <th>Borrowered Book</th>
            <th>Category Title</th>
            <th>Borrower Status</th>
            <th>Actions</th>
        </tr>
        @foreach($borrowers as $borrower)
            <tr>
                <td>{{$borrower['id']}}</td>
                <td>{{$borrower['name']}}</td>
                <td>{{$borrower['email']}}</td>
                <td>{{$borrower['phone']}}</td>
                <td>{{$borrower['address']}}</td>
                <td>{{$borrower['book']['title']}}</td>
                <td>{{$borrower['book']['category']['title']}}</td>
                <td>{{$borrower['status'] == "i" ? "issued": "recevied"}}</td>
{{--                ternary operator--}}
                <td>
                    @if($borrower['status'] == 'i')
                        <button type="submit"  class="btn btn-primary" onclick="changeBorrowerStatus({{$borrower['id']}}, {{$borrower['book_id']}}, 'r')"> Recieved</button>
                        <a href='{{ url("/viewBorrowerDetails/{$borrower['id']}") }}'><span class="btn btn-info">View</span></a>
                    @elseif($borrower['status'] =='r')
                        <a href='{{ url("/viewBorrowerDetails/{$borrower['id']}") }}'><span class="btn btn-info">View</span></a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script>
    function changeBorrowerStatus(borrower_id,book_id,status){
        swal({
            title: "okay!!!!!",
            showCancelButton: true,
            confirmButtonText: "Are u Sure",
            confirmButtonColor: "#c2ebec",
            cancelButtonColor: "#e0e0eb",
            type:"success"
        })
            .then((result) => {
                if (result.value == true) {
                    $.ajax({
                        type: "post",
                        url: "/changeBorrowerStatus/borrower_id",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            borrower_id: borrower_id,
                            book_id:book_id,
                            status: status,
                        },
                        success: function(data, status) {
                            console.log(data);
                            console.log(status);
                            swal("Success", "Success", "success").then((value) => {
                                location.reload();
                            });
                        }
                    })
                }
            })
    }
</script>
