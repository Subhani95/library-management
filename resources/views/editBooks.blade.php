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
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">EDIT BOOKS</p>
                                    <form class="mx-1 mx-md-4" action="{{route("updateBook")}}" method="post">
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

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" name="title" value="{{$book->title}}" autocomplete="off" />
                                                <label class="form-label" for="form3Example1c">Book Title</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" class="form-control" name="author" value="{{$book->author}}" required  autocomplete="off"/>
                                                <label class="form-label" for="form3Example3c">Author</label>
                                            </div>
                                        </div>
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Select Category</label>
                                                <div class="controls">
                                                    <select class="form-select classic" aria-label="Default select example" name="category_id" required>
                                                        <option selected value="{{$book->category_id}}">{{$book->category->title}}</option>
                                                        @foreach($categories as $category)
                                                            <option name="category_id" value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Select Book Shelf</label>
                                                <div class="controls">
                                                    <select class="form-select classic" aria-label="Default select example" name="bookShelf_id" required>
                                                        <option selected value="{{$book->bookShelf_id}}">{{$book->bookShelf->name}}</option>
                                                        @foreach($bookShelfs as $bookShelf)
                                                            <option name="bookShelf_id" value="{{ $bookShelf->id }}">{{ $bookShelf->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        <input type="hidden" value="{{$book->id}}" name="book_id">
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">UPADTE BOOK</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

</body>
</html>

