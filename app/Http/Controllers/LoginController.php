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
            'no_induk' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('no_induk', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            Auth::login($user);

            session()->put('user.no_induk', $user->no_induk);
            session()->put('user.nama', $user->nama);
            session()->put('user.kelas', $user->kelas);
            //dd($user);
            return redirect('/dashboard_user')->with('success', 'Berhasil Masuk!');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            session()->put('admin.no_induk', $admin->no_induk);
            session()->put('admin.nama', $admin->nama);
            //dd($admin);
            return redirect('/dashboard')->with('success', 'Berhasil Masuk!');
        }


        return redirect('/login')->with('failed', 'No Induk atau Password Salah');
    }
}
