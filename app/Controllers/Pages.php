<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Supermarket System',
        ];
        return view('pages/home', $data);
    }

    public function users()
    {
        $data = [
            'title' => 'Users | Supermarket System',
        ];
        echo view('pages/users', $data);
    }
}
