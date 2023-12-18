<?php namespace App\Controllers;

class Orders extends BaseController
{
    public function index()
    {
        $client = \Config\Services::curlrequest();
        $apiUrl = 'http://localhost:8080/transaction/indoapril/password';
        $response = $client->request('GET', $apiUrl);
        
        if($response) {
            $orders = json_decode($response->getBody(),true)['0'];
        } else {
            echo 'Failed to fetch data from API.';
        }

        $data = [
            'title' => 'Orders | Supermarket System',
            'orders' => $orders,
        ];
        return view('orders', $data);
    }
}

?>