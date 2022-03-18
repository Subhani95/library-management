<?php

namespace App\Http\Controllers;

use App\Mail\SendingEmail;
use App\Models\BookShelf;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBookRequest;
use App\Events\Email;
use App\Models\Book;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function books(){
        $categories = Category::viewCategory();
        $bookShelfs = BookShelf::viewBookShelf();

        return view('books', compact('categories','bookShelfs'));
    }

    public function addBook(StoreBookRequest $request)
    {
        try {
            $inputs = $request->except('_token');
            if(Book::addBook($inputs)){
//                 event (new Email($inputs));
                Mail::to('subhanihassan16@gmail.com')->send(new SendingEmail($inputs));
                return redirect()->route('books')->with("success","Book Entered Successfully");
            } else {
                return redirect()->back()->with("fail","Oops! something went wrong");
            }
        }catch(\Exception $ex) {
            dd($ex->getMessage());
            return back()->withErrors('your error message');
        }
    }


    public function viewBooks(Request $request){

        $search = $request['search'] ?? "";
        if($search !=""){
            $books = Book::searchBook($search);
        }else{
            $books=Book::getBook();
        }
        $data=compact('books','search');
        return view('viewBooks')->with($data);
    }



    public function changeBookStatus(Request $request)
    {
        try {
            $status = Book::bookStatus($request->book_id, $request->status);
            if ($status) {
                return response()->json(["message" => "Book status has been updated"], 200);
            }
            return response()->json(["message" => "Something went wrong"], 400);
        }
        catch(\Exception $ex) {

            return back()->withError($ex->getMessage())->withInput();
        }
    }

    public function editBooks($book_id){
        $book = Book::edit_Book($book_id);
        $categories = Category::viewCategory();
        $bookShelfs = BookShelf::viewBookShelf();

        return view('editBooks', compact('categories', 'book','bookShelfs'));
    }



    public function updateBook(Request $request)
    {
        $update = Book::updateBook($request);
        if($update){
            return redirect()->route('viewBooks')->with("success","Book Updated Successfully");
        }
    }

    public function bookDetail($book_id)
    {
        $book = Book::getBookDetail($book_id);

        return view('bookDetail', compact('book'));
    }

}
