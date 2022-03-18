<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\CategoryModel;
use App\Models\BorrowerModel;
use App\Models\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function searchByCategory(Request $request){
        $search =[];
        $search_key = $request['search'] ?? "";
        if($search_key !=""){
            $search = CategoryModel::searchCategory($search_key);

            // dd($search->toArray());
        }

      return view('searchByCategory', compact('search'));
    }

}











































//    public function search(Request $request)
//    {
//        $search = $request['search'] ?? "";
//        if($search !=""){
//            $search = \App\Models\CategoryModel::with(['newBook.borrower'])->where('title','like',"%$search%")->get();
//        }
//        dd($search->toArray());
//        return view('searchData', compact('search'));
//    }

