<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $table="categories";
    public $timestamps = true;

    public $fillable =['title'];


    public function book(){
        return $this->hasMany('App\Models\Book','category_id','id');
    }
    public static function addCategory($inputs){
        $category = new Category($inputs);
        return $category->save();
    }

    //passing array dynamically
    public static function categoryStatus($category_id, $status){
        return Category::where('id', $category_id)->update(["status" => $status]);
    }

    public static function getCategory(){
        return Category::where("status", "!=", "delete")->orderBy('id')->paginate(5);
    }

    public static function viewCategory(){
        return Category::where('status', '!=', 'delete')->get();
    }
}
