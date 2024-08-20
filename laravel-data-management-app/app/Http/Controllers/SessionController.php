<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
         // Debugging: Dump and Die to see all request data
        // dd($request->all());
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        Session::flash('phone',$request->phone);
        // 
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone' => 'required|numeric',
            'password'=>'required'
        ], [
            'name.required'=>'Name is Required',
            'email.required'=>'Email is Required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'Email is already registered',
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number must contain only numbers',
            'password.required'=>'Password is Required'
        ]);
        $data=[
            'name'=> $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'password'=> Hash::make($request->password),
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($infologin)){
            // return 'sukses';
            return redirect('project')->with('success',Auth::user()->name .', Berhasil Login');
        }
        else{
            // return 'gagal';
            return redirect('sesi')->withErrors('Incorrect Email or Password');
        } 
    }

}

