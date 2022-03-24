<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();
            // dd($user->id);
      
            $finduser = User::where('gmail', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect()->route('admin.home');

      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gmail'=> $user->id,
                    'facebook_id'=>'1',
                    'password' => encrypt('123456')
                ]);
     
                Auth::login($newUser);
      
                return redirect()->route('admin.home');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
