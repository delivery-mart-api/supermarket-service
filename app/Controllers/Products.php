<?php namespace App\Controllers;

use App\Models\ProductsModel;

class Products extends BaseController
{
    protected $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
    }

    public function index()
    {
        $products = $this->productsModel->findAll();
        $data = [
            'title' => 'Home | Supermarket System',
            'products' => $products
        ];
        return view('pages/products', $data);
    }

    public function save()
    {
        $this->productsModel->save([
            'nama' => $this->request->getVar('nama'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'berat' => $this->request->getVar('berat'),
            'gambar' => $this->request->getVar('gambar'),
        ]);

        session()->setFlashdata('pesan','Produk berhasil ditambahkan.');

        return redirect()->to(base_url('/'));
    }
}