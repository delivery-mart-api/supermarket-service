<?php

namespace App\Controllers;

class Pages extends BaseController
{

    // public function index()
    // {
    //     $products = $this->productsModel->findAll();
    //     $data = [
    //         'title' => 'Home | Supermarket System',
    //         'products' => $products
    //     ];
    //     return view('pages/home', $data);
    // }

    public function users()
    {
        $data = [
            'title' => 'Users | Supermarket System',
        ];
        echo view('pages/users', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login | Supermarket System',
        ];
        echo view('pages/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register | Supermarket System',
        ];
        echo view('pages/register', $data);
    }
}