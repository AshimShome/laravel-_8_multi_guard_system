<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{ public function check(Request $request){
    $request->validate([
        'email'=>'required',
        'password'=>'required|min:5|max:20',
    ]);
    $check=$request->only('email','password');
    if(Auth::guard('admin')->attempt($check)){
        return redirect()->route('admin.home');
    }
    else{
        return redirect()->route('admin.login')->with('fail','Some thing went wrong! Please try again');
    }
}
    public  function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
