<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    public $table="categories";
    public $timestamps = true;

    public $fillable =['title'];

    public function book(){
        return $this->hasMany('App\Models\Book','category_id','id');
    }

    /**
     * Search book by category
     * @param $search
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function searchCategory($search=""){
        $categories = CategoryModel::whereHas('book',function($sql){
            $sql->where("status","<>","d");
        })->with(['book'=>function($sql){
            $sql->where("status","<>","d");
            $sql->with(["borrower"]);
        }]) ->where('title','like',"%$search%")->get();
        return $categories;
    }
}
