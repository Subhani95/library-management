<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerModel extends Model
{
    use HasFactory;
    public $table = "borrowerdetail";
    public $timestamps = true;

    public $fillable = ['book_id','name','email', 'phone', 'address'];

}
