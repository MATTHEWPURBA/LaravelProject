<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view('sesi/index');
    }
    function login(Request $request)
    {
        // Debugging: Dump and Die to see all request data
        // dd($request->all());
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ], [
            'email.required'=>'Email is Required',
            'email.email' => 'Please enter a valid email address',
            'password.required'=>'Password is Required'
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($infologin)){
            // return 'sukses';
            return redirect('project')->with('success','Berhasil Login');
        }
        else{
            // return 'gagal';
            return redirect('sesi')->withErrors('Incorrect Email or Password');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil Logout');
    }
}
