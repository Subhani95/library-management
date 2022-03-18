<?php

namespace App\Http\Controllers;
use App\Mail\SendingEmail;
use App\Mail\SendingPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class ForgetPasswordController extends Controller
{
    //

    public function forgetpassword(Request $request){

//        dd($request->all());
        $user = User::whereEmail($request['email'])->first();
        if($user==null){
            return redirect()->route('forgetpassword')->with("fail","Email Does Not Exists.Please Enter Valid Email");
        }else{
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $user['password'] = substr( str_shuffle( $characters ), 0, 8 );
            $user['email'] = $request['email'];
            User::where('email',$request['email'])->update(['password'=>Hash::make($user['password'])]);
            Mail::to($request['email'])->send(new SendingPassword($user));
            return redirect()->route('login')->with("success","Password Send To Your Email Kindly Check Your Email");
        }

    }


}
