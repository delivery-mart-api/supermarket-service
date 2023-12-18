<?php namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Products extends ResourceController
{
    protected $modelName = 'App\Models\ProductsModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index($seg1 = null, $seg2 = null)
    {
        $user = $this->model->getUserByUsername($seg1);

        if ($user && $this->verifyPassword($seg2, $user['password'])) {
            // Jika username ditemukan dan password cocok
            return $this->respond($this->model->getApiProducts($seg1));
        } else {
            // Jika username tidak ditemukan atau password tidak cocok
            return $this->respond('Wrong Authentication', 401);
        }
    }

    protected function verifyPassword($inputPassword, $hashedPassword)
    {
        $inputPasswordHash = sha1($inputPassword);

        return $inputPasswordHash === $hashedPassword;
    }
}

?>