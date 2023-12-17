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
        $products = $this->productsModel->getProduct();
        $data = [
            'title' => 'Home | Supermarket System',
            'products' => $products,
            'validation' => \Config\Services::validate()
        ];
        return view('products', $data);
    }

    public function save()
    {
        // validasi input
        if(!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[products.nama]',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_unique' => '{field} produk sudah terdaftar'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                ]
            ],
            'harga' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_natural' => '{field} produk harus bernilai positif.'
                ]
            ],
            'stok' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_natural' => '{field} produk harus bernilai positif.'
                ]
            ],
            'berat' => [
                'rules' => 'required|is_natural_no_zero',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_natural_no_zero' => '{field} produk harus bernilai positif dan tidak nol.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation()
            // return redirect()->to(base_url('/'))->withInput('validation', $validation);
        }

        // ambil gambar
        // $fileGambar = $this->request->getFile('gambar');
        
        // if($fileGambar->getError() == 4) {
        //     $namaGambar = 'default.png';
        // } else {
        //     $namaGambar = $fileGambar->getRandomName();
            
        //     $fileGambar->move('img', $namaGambar);
        // }
        
        $kategori = $this->request->getVar('kategori');
        if($kategori == 'Minuman') {
            $namaGambar = 'beverages.png';
        } else if ($kategori == 'Daging') {
            $namaGambar = 'meat.png';
        } else if ($kategori == 'Sayuran') {
            $namaGambar = 'vegetable.png';
        } else if ($kategori == 'Buah') {
            $namaGambar = 'fruits.png';
        } else {
            $namaGambar = 'toiletries.png';
        }


        $this->productsModel->save([
            'nama' => $this->request->getVar('nama'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'berat' => $this->request->getVar('berat'),
            'gambar' => $namaGambar,
        ]);
        
        session()->setFlashdata('pesan','Produk berhasil ditambahkan.');

        return redirect()->to(base_url('/'));
    }

    public function delete($id)
    {
        $product = $this->productsModel->find($id);

        // if($product['gambar'] != 'default.png'){
        //     // hapus gambar
        //     unlink('img/' . $product['gambar']);
        // }
        $this->productsModel->delete($id);
        session()->setFlashdata('pesan','Produk berhasil dihapus.');
        return redirect()->to(base_url('/'));
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product | Supermarket System',
            'product' => $this->productsModel->getProduct($id),
            'validation' => \Config\Services::validation()
        ];
        return view('edit', $data);
    }

    public function update($id)
    {
        // validasi input
        $produkLama = $this->productsModel->getProduct($id);
        if($produkLama['nama'] == $this->request->getVar('nama')){
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[products.nama]';
        }

        if(!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_unique' => '{field} produk sudah terdaftar'
                ]
            ],
            'harga' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_natural' => '{field} produk harus bernilai positif.'
                ]
            ],
            'stok' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_natural' => '{field} produk harus bernilai positif.'
                ]
            ],
            'berat' => [
                'rules' => 'required|is_natural_no_zero',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_natural_no_zero' => '{field} produk harus bernilai positif dan tidak nol.'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
            // return redirect()->to(base_url('edit/'.$id))->withInput();
        }

        // $fileGambar = $this->request->getFile('gambar');

        // if($fileGambar->getError() == 4) {
        //     $namaGambar = $this->request->getVar('gambarLama');
        // } else {
        //     $namaGambar = $fileGambar->getRandomName();
        //     $fileGambar->move('img', $namaGambar);
        //     unlink('img/' . $this->request->getVar('gambarLama'));
        // }

        $kategori = $this->request->getVar('kategori');
        if($kategori == 'Minuman') {
            $namaGambar = 'beverages.png';
        } else if ($kategori == 'Daging') {
            $namaGambar = 'meat.png';
        } else if ($kategori == 'Sayuran') {
            $namaGambar = 'vegetable.png';
        } else if ($kategori == 'Buah') {
            $namaGambar = 'fruits.png';
        } else {
            $namaGambar = 'toiletries.png';
        }

        $this->productsModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'berat' => $this->request->getVar('berat'),
            'gambar' => $namaGambar,
        ]);
            session()->setFlashdata('pesan','Produk berhasil diubah.');

        return redirect()->to(base_url('/'));
    }
}