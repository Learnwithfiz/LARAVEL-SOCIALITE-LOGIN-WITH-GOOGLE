<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function OnIndex()
    {
        return view('index');
    }
    public function OnLogin()
    {
        return view('login');
    }

    public  function OnLoginUserRegister(Request $req)
    {
        $name = $req->name;
        $email = $req->email;
        $password =Hash::make($req->password);

        $user = User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        ]);

        if($user)
        {
            return redirect()->back()->with('msg','Data insert success');
        }else{
             return redirect()->back()->with('msg','Data insert Failed');
        }
    }

    public function OnLoginUserCheck(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $credintional = ['email'=>$email,'password'=>$password];
        if(Auth::attempt($credintional))
        {
            return redirect('/dashboard');
        }else{
             return redirect()->back()->with('msg','User Email Or Password Invalid'); 
        }
    }

    public function OnDashboard()
    {
        return view('dashboard');
    }

    public function OnLogout(Request $req)
    {
        $req->session()->flush();
        return redirect('/login');
    }
}
