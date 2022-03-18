<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerDetail extends Model
{
    use HasFactory;
    public $table = "borrowerdetail";
    public $timestamps = true;

    public $fillable = ['book_id','name','email', 'phone', 'address'];

    public function book(){
        return $this->belongsTo('App\Models\Book', 'book_id', 'id');
    }

    public static function addBorrower($inputs){
        $borrower = new BorrowerDetail($inputs);
        if($borrower->save() && Book::incFunction($borrower) && Book::decFunction($borrower) ){
            return true;
            }
        else{
            return false;
        }
        }

//    public static function getBorrower(){
//        return BorrowerDetail::all();
//    }

    public static function borrowerStatus($borrower_id,$book_id,$status){

        if(BorrowerDetail::where('id', $borrower_id)->update(["status" => $status]) && Book::incFunc($book_id) && Book::decFunc($book_id)){
            return true;
        }else{
            return false;
        }

    }


    public static function getBorrowerDetails($borrower_id){
        return BorrowerDetail::where('id',$borrower_id)->first();
    }


    /**
     * search borrower details through name, email,address
     * search borrower detail through book title
     * @param $search
     * @return mixed
     */


    public static function searchBorrower($search)
    {
        $query = BorrowerDetail::with(["book.category"]);
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhereHas('book', function ($sql) use ($search) {
                    if (!empty($search)) {
                        $sql->where('title', 'like', '%' . $search . '%');
                    }

                })
                ->orWhereHas('book.category', function ($sql) use ($search) {
                    if (!empty($search)) {
                        $sql->where('title', 'like', '%' . $search . '%');
                    }
                });
        }
        $borrowers = $query->get();
        return $borrowers;

    }

}
