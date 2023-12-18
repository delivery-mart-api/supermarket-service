<?php namespace App\Controllers;

use App\Models\ProductsModel;

class Orders extends BaseController
{
    public function index()
    {
        $client = \Config\Services::curlrequest();
        $apiUrl = 'http://localhost:8080/transaction/indoapril/password';
        $response = $client->request('GET', $apiUrl);
        if($response) {
            $orders = json_decode($response->getBody(), true);
            $filteredOrder = [];
            $productsModel = new ProductsModel();

            foreach ($orders as $order) {
                if ($order['supermarket_username'] == session()->get('num_user')['username']) {
                    $productId = $order['product_id'];
                    $productInfo = $productsModel->getProductById($productId);
                    
                    $filteredOrder[] = [
                        'order_id' => $order['id'],
                        'product_name' => $productInfo['nama'], 
                        'quantity' => $order['quantity'],
                        'address' => $order['address'],
                        'created_at' => $order['created_at']
                    ];
                }
            }

            $shareUrl = 'http://localhost:8080/api/share/indoapril/password';
            $shareResponse = $client->request('GET', $shareUrl);
            $share = 0;
            if($shareResponse) {
                $share = json_decode($shareResponse->getBody(), true);
            }
            $data = [
                'title' => 'Orders | Supermarket System',
                'orders' => $filteredOrder,
                'profit_share' => $share
            ];
            return view('orders', $data);

        } else {
            echo 'Failed to fetch data from API.';
        } 
    }
}

?>