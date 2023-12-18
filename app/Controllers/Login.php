<?php

namespace App\Controllers;

use App\Models\UserModel; 
use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {   
        // UNCOMMENT jika ingin restrict access route kalo berhasil login
        if (session()->get('num_user') != '') {
            return redirect()->to(base_url('products'));
        }
        return view('login');
    }

    public function login(){
        $model = model(LoginModel::class);
        $username = $this->request->getPost('username');
        $password = sha1($this->request->getPost('password'));
        $cek = $model->getUsers($username, $password);
        if ($cek == 0){
            return redirect()->to('/login');
        } else {
            session()->set('num_user', $cek);
            return redirect()->to('/products');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}
