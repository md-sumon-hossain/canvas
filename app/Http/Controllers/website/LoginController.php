<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     #this is for login page view
    public function login(){
        return view ('website.layouts.login');
    }

    #here, this method will post the login credentials
    public function dologin(Request $request){
    //  dd($request->all());   

    # get others value excepting token(csrf).
    //$variable=$request->except('_token');

    # get decleared value  inside () excepting token(csrf)
    $variable=$request->only('email','password');
    if (Auth::attempt($variable)) {
        # code...
        return redirect()->route('website.home');
    }
    else {
        # code...
        return redirect()->route('website.login');
        }
    }
    
    #logout for an user
    public function logout(){
        Auth::logout();
        return redirect()->route('website.login');
    }

}
