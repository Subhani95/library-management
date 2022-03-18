<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowerRequest;
use App\Models\BorrowerDetail;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BorrowerController extends Controller
{
    //
    public function borrower(){
        $books = Book::getBook();
//        $categories = Category::getCategory();
        return view('borrower', compact('books'));
    }
    public function addBorrower(StoreBorrowerRequest $request)
    {
        try {
            $inputs = $request->except('_token');
            if(BorrowerDetail::addBorrower($inputs)){
                return redirect()->route('borrower')->with("success","Borrower Entered Successfully");
            } else {
                return redirect()->back()->with("fail","Oops! something went wrong");
            }
        }catch(ModelNotFoundException $exception) {

            return back()->withError($exception->getMessage())->withInput();

        }
    }



    /**
     * listing page borrower details with searching

     */

    public function listingPage(Request $request)
    {
        $search = $request['searchCase'] ?? "";
        $borrowers = BorrowerDetail::searchBorrower($search);
        $data=compact('borrowers','search');
        return view('listingPage')->with($data);
    }




    public function changeBorrowerStatus(Request $request)
    {
        try {
            $status = BorrowerDetail::borrowerStatus($request->borrower_id, $request->book_id, $request->status);
            if ($status) {
                return response()->json(["message" => "Book has been returned back"], 200);
            }
            return response()->json(["message" => "Something went wrong"], 400);
        }
        catch(\Exception $ex) {

            return back()->withError($ex->getMessage())->withInput();
        }
    }

    public function viewBorrowerDetails($borrower_id)
    {
        $borrower = BorrowerDetail::getBorrowerDetails($borrower_id);
        return view('viewBorrowerDetails', compact('borrower'));
    }


}
