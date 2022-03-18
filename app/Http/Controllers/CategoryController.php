<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function addCategory(Request $request)
    {
        try {
       $inputs = $request->except('_token');
        $rules = [
            "title"=>"required|unique:categories",
        ];
        // $validate = Validator::make($inputs,$rules);
        $validate = Validator::make($inputs, $rules, $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        if($validate->fails()){
            return redirect()->back()->with("fail",$validate->errors()->first());
        }
        if(Category::addCategory($inputs)){
            return redirect()->route('category')->with("success","Category Entered Successfully");
        } else {
            return redirect()->back()->with("fail","Oops! something went wrong");
        }
        }catch(ModelNotFoundException $exception) {

        return back()->withError($exception->getMessage())->withInput();

    }
    }

    public function viewCategory(){

          $categories = Category::getCategory();
//          dd($categories->toArray());
          return view('viewCategory',compact('categories'));
    }

    public function changeCategoryStatus(Request $request)
    {
        try {
            $status = Category::categoryStatus($request->category_id, $request->status);
            if ($status) {
                return response()->json(["message" => "Success "], 200);
            }
            return response()->json(["message" => "Something went wrong"], 400);
        }
        catch(ModelNotFoundException $exception) {

        return back()->withError($exception->getMessage())->withInput();
        }
    }
}
