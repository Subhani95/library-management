<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;

class NewBorrowerController extends Controller
{
    //

    public function borrower(){
        $books = BookModel::getBook();
        return view('borrower', compact('books'));
    }
}
