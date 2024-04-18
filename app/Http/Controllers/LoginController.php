<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $data =[
            'nim' => $request->nim,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect('/dashboard');
        }else{
            return  redirect('login')->with('failed','No Induk atau Password Salah');
        }
    }
}
