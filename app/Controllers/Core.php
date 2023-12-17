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

    public function rekomendasi($supermarket_id, $user_id) {
        $curl = curl_init(sprintf('http://localhost:8080/transactions/%u',$supermarket_id));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $transactions = curl_exec($curl);
        curl_close($curl);
        
        $decodedTransactions = json_decode($transactions, true);

        if ($decodedTransactions === null) {
            return $this->respond('Error decoding JSON');
        }

        if (!$decodedTransactions) {
            return $this->respond("Tidak ada rekomendasi produk.");
        } else {
            $products = array();
            $curl = curl_init(sprintf('http://localhost:8080/users/%u',$user_id));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $age = curl_exec($curl);
            curl_close($curl);
            
            $decodedAge = json_decode($age, true);

            if ($decodedAge === null) {
                return $this->respond('Error decoding JSON');
            } else {
                foreach($decodedTransactions as $transaction) :
                    $curl = curl_init(sprintf('http://localhost:8080/users/%u',$transaction['user_id']));
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $age = curl_exec($curl);
                    curl_close($curl);
                    
                    $decodedProductAge = json_decode($age, true);

                    if ($decodedProductAge === null) {
                        return $this->respond('Error decoding JSON');
                    } else {
                        if (($decodedProductAge)[0]['age'] == $decodedAge[0]['age']) {
                            array_push($products,$transaction['product_id']);
                        }
                    }
                endforeach;
                $maxProduct = 0;
                $countTotal = 0;
                foreach($products as $product) :
                    $count = 0;
                    foreach($products as $product2) :
                        if ($product == $product2) {
                            $count += 1;
                        }
                    endforeach;
                    if ($count > $countTotal) {
                        $countTotal = $count;
                        $maxProduct = $product;
                    }
                endforeach;

                if ($maxProduct != 0) {
                    return $this->respond(model(ProductsModel::class)->findById($maxProduct)['nama']);
                } else {
                    return $this->respond("Tidak ada rekomendasi produk.");
                }
            }
        }
        
    }
}