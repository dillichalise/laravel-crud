<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function login()
    {
        return view('user.login');
    }

    public function create()
    {
        return view('user.register');
    }
}
