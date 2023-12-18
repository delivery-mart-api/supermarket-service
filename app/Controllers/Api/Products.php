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
        $user = $this->model->getUser($seg1, $seg2);

        if ($user) {
            // Jika username ditemukan dan password cocok
            return $this->respond($this->model->getApiProducts($seg1));
        } else {
            // Jika username tidak ditemukan atau password tidak cocok
            return $this->respond('Wrong Authentication', 401);
        }
    }
}

?>