<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nim', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard_user');
        } else {
            return redirect('login')->with('failed', 'No Induk atau Password Salah');
        }
    }
}
