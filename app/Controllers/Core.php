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

    public function rekomendasi() {
        $curl = curl_init('http://localhost:8080/users');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $user_id = curl_exec($curl);
        curl_close($curl);
        
        $decodedUsers = json_decode($user_id, true);

        if (!$decodedUsers) {
            return $this->respond([]);
        } else {
            $curl = curl_init('http://localhost:8080/transaction/indoapril/password');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $transaction = curl_exec($curl);
            curl_close($curl);
            
            $decodedTransactions = json_decode($transaction, true);
    
            if (!$decodedTransactions) {
                $emptyTransaction = array();
                foreach($decodedUsers as $user) :
                    array_push($emptyTransaction, "0");
                endforeach;
                return $this->respond($emptyTransaction);
            } else {
                $rekomen = array();
                
                foreach($decodedUsers as $user) :
                    $history = array();
                    foreach($decodedTransactions as $transaction) :
                        if ($user['id'] == $transaction['user_id']) {
                            array_push($history,$transaction['product_id']);
                        }
                    endforeach;
                    $maxProduct = "0";
                    $countTotal = 0;
                    foreach($history as $i) :
                        $count = 0;
                        foreach($history as $j) :
                            if ($i == $j) {
                                $count += 1;
                            }
                        endforeach;
                        if ($count > $countTotal) {
                            $countTotal = $count;
                            $maxProduct = $i;
                        }
                    endforeach;
                    array_push($rekomen,$maxProduct);
                endforeach;
                return $this->respond($rekomen);
            }
        }
    }
}