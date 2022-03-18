<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = "books";
    public $timestamps = true;

    public $fillable = ['category_id','bookShelf_id','title', 'author', 'total_books','remaining_books'];

    protected $appends=['createdat'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function bookShelf(){
       return $this->belongsTo('App\Models\BookShelf','bookShelf_id');
    }

    public function borrower(){
        return $this->hasOne('App\Models\BorrowerModel')->where('status', '!=','r');
    }

    public static function addBook($inputs)
    {
        $request_params['category_id']=$inputs['category_id'];
        $request_params['bookShelf_id']=$inputs['bookShelf_id'];
        $request_params['title']=$inputs['title'];
        $request_params['author']=$inputs['author'];
        $request_params['total_books']=$inputs['total_books'];
        $request_params['remaining_books']=$inputs['total_books'];
        $book = new Book($request_params);
        return $book->save();

    }
     public static function bookStatus($book_id,$status){
        
        return Book::where('id', $book_id)->update(["status" => $status]);
     }

    // public static function getBook(){

    //     return Book::where("status", "!=", "delete")->orderBy('id')->paginate(5);
    // }
    public static function searchBook($search){

        // return Book::where('title','like',"%$search%");
        $categories = Book::whereHas('category',function($sql){
            $sql->where("category_id","=","1");
        })->get();
        return $categories;
    }

    public static function getBook(){
        $books = Book::whereHas('category',function($sql){
            $sql->where("category_id","=","5");
        })->get();
        return $books;

    }







    public static function incFunction($borrower){
        return Book::where('id', $borrower->book_id)->increment('issued_books',1);
    }
    public static function decFunction($borrower){
        return Book::where('id', $borrower->book_id)->decrement('remaining_books',1);
    }

    public static function incFunc($book_id){
        return Book::where('id', $book_id)->decrement('issued_books',1);
    }
    public static function decFunc($book_id){
        return Book::where('id', $book_id)->increment('remaining_books',1);
    }

    public static function updateBook($request){
        $book = Book::find($request->book_id);
        $book->title=$request->title;
        $book->author=$request->author;
        $book->category_id=$request->category_id;
        $book->bookShelf_id =$request->bookShelf_id;
        if($book->save()){
            return true;
        }
        return false;
    }

    public static function edit_Book($book_id){
        return Book::where('id',$book_id)->first();
    }

    public static function getBookDetail($book){
        return Book::where('id',$book)->first();
    }
    
    public function getRegistered(){
        return $this->created_at->diffForHumans();
    }

}
















































































































