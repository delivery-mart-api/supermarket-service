<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {   
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('welcome_message');
    }
}