<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function index() {

        return view('login.index');

    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Session::put('username',$request->get('username'));
            return redirect()->intended('/main');
        }

        return back()->with('loginError','Login Failed !');
    }

    public function logout() {
        session()->flush();

        return redirect('/');
    }
}
