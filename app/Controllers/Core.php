<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductsModel;

class Core extends ResourceController
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
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
    public function rekomendasi() {
        // $curl = curl_init('http://localhost:8080/transaction/indoapril/password');
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $transaction = curl_exec($curl);
        // curl_close($curl);
        
        // $decodedTransactions = json_decode($transaction, true);

        // if (!$decodedTransactions) {
        //     return $this->respond([]);
        // } else {
        //     $users = array();
        //     foreach($decodedTransactions as $i) :
        //         $check = true;
        //         foreach($users as $j) :
        //             if ($i['user_id'] == $j) {
        //                 $check = false;
        //             }
        //         endforeach;
        //         if ($check) {
        //             array_push($users, $i['user_id']);
        //         }
        //     endforeach;
        //     $rekomen = array();
            
        //     foreach($users as $user) :
        //         $history = array();
        //         foreach($decodedTransactions as $transaction) :
        //             if ($user == $transaction['user_id']) {
        //                 array_push($history,$transaction['product_id']);
        //             }
        //         endforeach;
        //         $maxProduct = "0";
        //         $countTotal = 0;
        //         foreach($history as $i) :
        //             $count = 0;
        //             foreach($history as $j) :
        //                 if ($i == $j) {
        //                     $count += 1;
        //                 }
        //             endforeach;
        //             if ($count > $countTotal) {
        //                 $countTotal = $count;
        //                 $maxProduct = $i;
        //             }
        //         endforeach;
        //         $rekomen[$user] = $maxProduct;
        //     endforeach;
        //     return $this->respond($rekomen);
        // }
        $products = $this->productsModel->findAll();
        $randomIndex = array_rand($products, 3);

        $randomProducts = [];

        foreach ($randomIndex as $index) {
            $randomProducts[] = $products[$index];
        }
        
        return $this->respond($randomProducts);
    }
}
