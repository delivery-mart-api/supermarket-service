<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductsModel;

class Core extends ResourceController
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($id = null){
        $products = model(ProductsModel::class)->findById($id);
        if ($products)  {
            if ($products["berat"] < 50) {
                $delivery = "motor";
            } elseif ($products["berat"] < 100) {
                $delivery = "mobil pick up";
            } else {
                $delivery = "truk";
            }
            return $this->respond($delivery);
        } else {
            return 0;
        }
    }
    public function rekomendasi($seg1 = null, $seg2 = null) {
        $user = $this->productsModel->getUser($seg1, $seg2);

        if ($user) {
            // Jika username ditemukan dan password cocok
            $products = $this->productsModel->findAll();
            $randomIndex = array_rand($products, 3);

            $randomProducts = [];

            foreach ($randomIndex as $index) {
                $randomProducts[] = $products[$index];
            }
            
            return $this->respond($randomProducts);
        } else {
            // Jika username tidak ditemukan atau password tidak cocok
            return $this->respond('Wrong Authentication', 401);
        }
    }
}
