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
        session();
        $products = $this->productsModel->findAll();
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
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Tolong pilih file gambar',
                    'mime_in' => 'Tolong pilih file gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validate();
            // return redirect()->to(base_url('/'))->withInput('validation', $validation);
            return redirect()->to(base_url('/'))->withInput();
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        
        if($fileGambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            
            $fileGambar->move('img', $namaGambar);
        }
        

        $this->productsModel->save([
            'nama' => $this->request->getVar('nama'),
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

        if($product['gambar'] != 'default.png'){
            // hapus gambar
            unlink('img/' . $product['gambar']);
        }
        $this->productsModel->delete($id);
        session()->setFlashdata('pesan','Produk berhasil dihapus.');
        return redirect()->to(base_url('/'));
    }

    public function update($id)
    {
        // validasi input
        if(!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[products.nama,id,{id}]',
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
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Tolong pilih file gambar',
                    'mime_in' => 'Tolong pilih file gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        if($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $this->productsModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'berat' => $this->request->getVar('berat'),
            'gambar' => $namaGambar,
        ]);
            session()->setFlashdata('pesan','Produk berhasil diubah.');

        return redirect()->to(base_url('/'));
    }
}