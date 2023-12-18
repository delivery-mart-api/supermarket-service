<?php namespace App\Controllers;

use App\Models\ProductsModel;

class Orders extends BaseController
{
    public function index()
    {
        $currentUsername = session()->get('num_user')['username'];
        $currentPassword = session()->get('num_user')['password'];
        $client = \Config\Services::curlrequest();
        $apiUrl = "http://localhost:8080/transaction/$currentUsername/$currentPassword";
        try {
            $response = $client->request('GET', $apiUrl);
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

            $shareUrl = "http://localhost:8080/api/share/$currentUsername/$currentPassword";
            try {
                $shareResponse = $client->request('GET', $shareUrl);
                $share = 0;
                $share = json_decode($shareResponse->getBody(), true);
                $data = [
                    'title' => 'Orders | Supermarket System',
                    'orders' => $filteredOrder,
                    'profit_share' => $share
                ];
                return view('orders', $data);
            } catch (\Exception $e) {
                $data =[
                    'title' => 'Oops | Supermarket System',
                    'error' => 'Error: ' . $e->getMessage()
                ];
                return view('error_redirect', $data);
            }

        } catch (\Exception $e) {
            $data =[
                'title' => 'Oops | Supermarket System',
                'error' => 'Error: ' . $e->getMessage()
            ];
            return view('error_redirect', $data);
        }
    }
}

?>