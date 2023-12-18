<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;

    public function create(){
        helper('form');
        $data = [];

        if($this->request->getMethod() != 'post'){
            return $this->fail('Only post request is allowed');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'username' => 'required|min_length[3]|max_length[30]|is_unique[user.username]',
            'password' => 'required|min_length[8]',
        ];

        if(!$this->validate($rules)){
            session()->setFlashData('Error', 'Registrasi Gagal!');
            return redirect()->to('/register')->withInput();
        } else{
            $model = new UserModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'role' => 'branch',
            ];

            $user_id = $model->insert($data);
            $data['id'] = $user_id;
            unset($data['password']);

            return redirect()->to('/login');
        }
    }
}
