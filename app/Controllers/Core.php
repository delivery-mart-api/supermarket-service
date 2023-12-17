<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductsModel;

class Core extends ResourceController
{
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
}