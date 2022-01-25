<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $username = session()->get('username');

        if ($username == "") {
            return redirect('/logout');
        }

        return view('layout.home',['username' => $username]);
    }
}
