<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Models\BorrowerModel;
class BookModel extends Model
{
    use HasFactory;

    public $table = "books";
    public $timestamps = true;

    public $fillable = ['category_id','bookShelf_id','title', 'author', 'total_books','remaining_books'];

    public function newCategory(){

        return $this->belongsTo('App\Models\CategoryModel');
    }

    public function newBorrower(){
        return $this->hasMany('App\Models\BorrowerModel');
    }

    public function bookShelf(){
        return $this->belongsTo('App\Models\BookShelf','bookShelf_id');
    }

    public static function getBook(){
        return Book::where("status", "!=", "delete")->orderBy('id')->paginate(5);
    }
}
