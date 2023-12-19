<?php

namespace App\Controllers;

use App\Models\UserModel;

class Branch extends BaseController
{
    public function index()
    {
        if (session()->get('num_user')['role'] == 'admin') {
            $userModel = new UserModel();
            $branches = $userModel->where('role', 'branch')->findAll();
            
            $data = [
                'title' => 'Branches | Supermarket System',
                'branches' => $branches,
                'validation' => \Config\Services::validation()
            ];

            return view('branches', $data);
        }

        return redirect()->to(base_url('/'));
    }
}
