<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {   
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        } else if (session()->get('num_user')['role'] == 'admin'){
            return view('register');
        } else {
            return redirect()->to('/');
        }
    }
}