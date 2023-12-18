<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // UNCOMMENT jika ingin restrict access route kalo belum login
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('product');
    }
}
