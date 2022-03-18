<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Events\PodcastProcessed;
use App\Events\Email;
class UserController extends Controller
{
    //view routes
    public function login(){
        return view('/login');
    }
    public function register(){
        return view('/register');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function userProfile(){
        return view('userProfile');
    }
    public function test(){
        return view('test');
    }
    public function category(){
        return view('category');
    }
    public function bookshelf(){      return view('bookshelf');
    }
    public function forgetpassword(){
        return view('forgetpassword');
    }


    public function registerUser(Request $request){
        $inputs = $request->except('_token');
        $rules = [
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:8",
            "photo"=>"required"
        ];
        $validate = Validator::make($inputs,$rules);
        if($validate->fails()){
//            die($validate->errors()->first());
            return redirect()->back()->with("fail",$validate->errors()->first());
        }
        $inputs['password'] = Hash::make($inputs['password']);
        // event (new PodcastProcessed($inputs));
        if(User::registerUser($inputs)){
            return redirect()->route('login')->with("success","User registered successfully");
        } else {
            return redirect()->back()->with("fail","Oops! something went wrong");
        }

         // trigger the event
        // event (new PodcastProcessed($inputs));
        //  return $inputs;
        // event (new PodcastProcessed($request->input('name'), $request->input('email'),$request->input('password'), $request->input('photo')));
        // return back();
    }

    //authenticated user for the login
    //only the vaild or authentice user will proceed to the dashboard page
    public function loginUser(Request $request){
        session_start();
        $inputs = $request->except('_token');
        $rules = [
            "email"=>"required|email",
            "password"=>"required"
        ];
        $validate = Validator::make($inputs,$rules);
        if($validate->fails()){
            return redirect()->back()->with("fail",$validate->errors()->first());
        }
        if(Auth::attempt($inputs)){
            return redirect()->route('dashboard')->with("success","User loggedin successfully");
        } else {
            return redirect()->back()->with("fail","Invalid email or password");
        }
    }


//Logging out the user from the dashboard and returning him to the login PAGE

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}
