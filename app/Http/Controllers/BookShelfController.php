<?php

namespace App\Http\Controllers;

use App\Models\BookShelf;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShelfRequest;
use Illuminate\Support\Facades\Validator;

class BookShelfController extends Controller
{
    //
    public function bookshelf(){
        return view('bookshelf');
    }
    public function addBookShelf(StoreShelfRequest $request)
    {
        try {
            $inputs = $request->except('_token');
            if(BookShelf::addBookShelf($inputs)){
                return redirect()->route('bookshelf')->with("success","Book Shelf Entered Successfully");
            } else {
                return redirect()->back()->with("fail","Oops! something went wrong");
            }
        }catch(ModelNotFoundException $exception) {

            return back()->withError($exception->getMessage())->withInput();

        }
    }

    public function viewBookShelf(){
        $search = $request['search'] ?? "";
        if($search !=""){
            $bookShelfs = BookShelf::searchShelf($search);
            dd($bookShelfs->ToArray());
        }else{
            $bookShelfs=BookShelf::getBookShelf();
        }
        $data=compact('bookShelfs','search');
        return view('viewBookShelf')->with($data);
    }

    public function changeShelfStatus(Request $request)
    {
        try {
            $status = BookShelf::shelfStatus($request->bookShelf_id, $request->status);
            if ($status) {
                return response()->json(["message" => "Now this Shelf is Deleted "], 200);
            }
            return response()->json(["message" => "Something went wrong"], 400);
        }catch(ModelNotFoundException $exception) {

            return back()->withError($exception->getMessage())->withInput();

        }
    }


    public function editBookShelf($bookShelf_id){
        $bookShelf = BookShelf::editShelf($bookShelf_id);
        return view('editBookShelf', compact('bookShelf'));
    }

    public function updateShelf(Request $request)
    {
        $update = BookShelf::updateShelf($request);
        if($update){
            return redirect()->route('viewBookShelf')->with("success","Shelf Updated Successfully");
        }
    }
}
