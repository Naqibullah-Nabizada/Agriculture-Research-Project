<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function login(Request $request){
        if($request->email == 'admin@gmail.com' && $request->password == '12345678'){
            Auth::loginUsingId(1);
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
