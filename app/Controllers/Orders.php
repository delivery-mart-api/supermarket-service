<?php namespace App\Controllers;

class Orders extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Orders | Supermarket System',
            'orders' => 'halo',
            'validation' => \Config\Services::validate()
        ];
        return view('orders', $data);
    }
}

?>