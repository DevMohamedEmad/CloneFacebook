<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use app\Models\Profile;
class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::User();
        $user_id= Auth::id() ;
        if($user->profile == null){
            $profile = Profile::create([
                'bio'=> "BackEnd",
                'address' => "Karmoz Alexandraia",
                'gender' => 'Male',
                'user_id' =>  $user_id
            ]);
        }else{
            return view('users.profile')->with('user',$user);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request , [
            'name'=>'required',
            'bio'=>'required',
            'address' =>'required',
            'gender' =>'required'
        ]);

        $user = Auth::User();
        $user->profile->bio = $request->bio;
        $user->profile->address = $request->address;
        $user->profile->gender = $request->gender;
        $user->name = $request->name;
        $user->save();
        $user->profile->save();
        if($request->has('password')){
            $user->password = Hash::make($request->password);
            $user->save();
        }
        return redirect()->back()->with('success' , "Updated Successfully");
    }
    public function destroy($id)
    {
        //
    }
}
