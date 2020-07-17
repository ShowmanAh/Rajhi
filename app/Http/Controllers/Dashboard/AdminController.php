<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   public function getLogin(){
       return view('dashboard.login');
   }
   // admin login
   public function login(LoginRequest $request){
         $remember_me = $request->has('remember_me') ? true : false;
        if(auth()->guard('admin')->attempt(['email'=> $request->input("email"), 'password'=> $request->input("password")])){
            return redirect()->route('dashboard.index');
        }
        return redirect()->back()->with(['error'=> 'هناك خطأ فى البيانات']);
   }
}
