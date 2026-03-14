<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginWithGoogle extends Controller
{
    public function OnRedirect()
    {
         return Socialite::driver('google')->redirect();
    }
    public function OnCallBack()
    {
         $GoogleUser = Socialite::driver('google')->user();
         
         $user = User::where('email',$GoogleUser->email)->first();
         if(!$user)
         {
           $user = User::create([
                'name'=>$GoogleUser->name,
                'email'=>$GoogleUser->email,
                'googleClientId'=>$GoogleUser->id,
                'password'=>  bcrypt('1234433')
            ]);
         }

         Auth::login($user);
         return redirect('/dashboard');
    }
}
