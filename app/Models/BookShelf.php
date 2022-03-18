<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    use HasFactory;
    public $table="bookshelf";
    public $timestamps = true;

    public $fillable =['name','number','location'];

    public static function addBookShelf($inputs){
        $bookShelf = new BookShelf($inputs);
        return $bookShelf->save();
    }

    public static function getBookShelf(){
       return BookShelf::where("status", "!=", "delete")->orderBy('id')->paginate(5);
    }

    public static function shelfStatus($bookShelf_id,$status){
        return BookShelf::where('id', $bookShelf_id)->update(["status" => $status]);
    }

    public static function editShelf($bookShelf_id){
        return BookShelf::where('id',$bookShelf_id)->first();
    }

    public static function updateShelf($request){
        $bookShelf = BookShelf::find($request->bookshelf_id);
        $bookShelf->name=$request->name;
        $bookShelf->number=$request->number;
        $bookShelf->location=$request->location;
        if($bookShelf->save()){
            return true;
        }
        return false;
    }

    public static function viewBookShelf(){
        return BookShelf::all();
    }

    public static function searchShelf($search){

        return BookShelf::where('name','like',"%$search%")->paginate(5);
    }
}
