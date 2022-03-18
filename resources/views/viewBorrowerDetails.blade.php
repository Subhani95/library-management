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
    <link rel="stylesheet" href="books.css">
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
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$borrower->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$borrower->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$borrower->phone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$borrower->address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Borrower Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($borrower->status == 'i')
                                    Issued
                                @elseif ($borrower->status == 'r')
                                    Recieved
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Issued Date and Time</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $borrower->created_at}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Recieved Date and Time</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $borrower->updated_at == $borrower->created_at ? "N-A": $borrower->updated_at}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Time Duration</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($borrower->updated_at->diffInHours($borrower->created_at)>=24)
                                    {{$borrower->updated_at->diffInDays($borrower->created_at)}} Day
                                @elseif($borrower->updated_at->diffInMinutes($borrower->created_at)>=60)
                                    {{$borrower->updated_at->diffInHours($borrower->created_at)}} Hour
                                    @elseif($borrower->updated_at->diffInMinutes($borrower->created_at)<60)
                                    {{$borrower->updated_at->diffInMInutes($borrower->created_at)}} Minutes
                                @endif

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ url("/listingPage") }}"><span class="btn btn-info">Previous Page</span></a>
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

