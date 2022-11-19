<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class authController extends Controller
{

    public function index()
    {
        return  view('auth.login');
    }

    public function postlogin(Request $st)
    {
      $data=$st->only("email","password");
      $data=$st->validate([
          'email'=>'required',
          'password'=>'required',
      ]);

      if(Auth::attempt($data))
        {
            return redirect()->route('home');
        }
       else{
          return view('auth.login');
      }
    }

    public function register(){

        return view('auth.register');

    }

    public function postregister(Request $request){
        $data=$request->validate([
            'email'=>'required',
            'password' => 'min:6',
            'cpassword' => 'required_with:password|same:password|min:6'
        ]);
        $user = User::create([

            'email'=> $request['email'],
            'name'=> $request['name'],
            'password'=> hash::make($data['password'])
        ]);

        if($user){
            return redirect()->route('home');
        }
    }

      public function logout(){
        Auth::logout();
        return view('auth.login');
      }


}
