<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name'=>'required',
             'email'=>'required|unique:users,email',
            'password'=>'required|min:5|max:20',
            'password_confirmation' => 'required_with:password|same:password|min:6'

        ]);
        $add_user = new User();
        $add_user->name = $request->name;
        $add_user->email = $request->email;
//        $add_user->role = $request->role;
        $add_user->password = Hash::make($request->password);
        $add_user->save();

        if( $add_user){
         return redirect()->back()->with('success','You Are now registered Successfully');
        }else{
            return redirect()->back()->with('fail','Something wrong!You Are Not registered');

        }
    }

    public function check(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:20',
        ]);
        $check=$request->only('email','password');
        if(Auth::guard('web')->attempt($check)){
         return redirect()->route('user.home');
        }
        else{
            return redirect()->route('user.login')->with('fail','Some thing went wrong! Please try again');
        }
    }
    public  function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
