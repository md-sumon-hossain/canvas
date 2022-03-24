<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    #this is for login page view
    public function login(){
        return view ('admin.layouts.login');
    }


    #here, this method will post the login credentials
    public function dologin(Request $request){
    //    dd($request->all());
    

    # get decleared value  inside () excepting token(csrf)
    // $variable=$request->only('email','password');


    # get others value excepting token(csrf)
    $variable=$request->except('_token');
    if (Auth::attempt($variable)) {
        # code...
        return redirect()->route('admin.home');
    }
    else {
        # code...
        return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }



    #socialite for facebook
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            // dd($user);
            $isUser = User::where('facebook_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect()->route('admin.home');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role'=>'user',
                    'password' => bcrypt('123456'),
                    'facebook_id' => $user->id,
                ]);

                Auth::login($createUser);
                return redirect()->route('admin.home');
            }

        } catch (\Throwable $exception) {
            dd($exception->getMessage());
            //  return redirect()->route('website.home');
        }
    }



    #linkedin socialite
    



    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinCallback()
    {
        try {
    
            $user = Socialite::driver('linkedin')->user();
     
            $finduser = User::where('linkedin_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/dashboard');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role'=>'user',
                    'linkedin_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/dashboard');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
