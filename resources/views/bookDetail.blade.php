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
    <link rel="stylesheet" href="bookDetail.css">
    <title>Books</title>
</head>

<body>
@extends('admin')

@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Book Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   {{$book->title}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Author</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                   {{$book->author}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Book Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if($book->status == 'a')
                                        Available
                                    @elseif ($book->status == 'b')
                                        block
                                    @elseif ($book->status == 'd')
                                        Delete
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Total Books</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                 {{$book->total_books}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Issued Book</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$book->issued_books}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Remaining Books</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$book->remaining_books}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href='{{ url("/editbooks/{$book->id}") }}'><span class="btn btn-info">Edit</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

</body>
</html>

