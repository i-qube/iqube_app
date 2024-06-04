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
        //dd($request->all());
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $credentialsUser = $request->only('nim', 'password');

        if (Auth::guard('web')->attempt($credentialsUser)) {
            $user = Auth::guard('web')->user();
            session()->put('user.nim', $user->nim);
            session()->put('user.nama', $user->nama);
            session()->put('user.kelas', $user->kelas);
            //dd($user);
            return redirect('/dashboard_user')->with('success', 'Berhasil Masuk!');
        } else {
            return redirect('/login')->with('failed', 'No Induk atau Password Salah');
        }
    }
}
