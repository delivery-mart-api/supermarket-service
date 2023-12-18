<?php namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\BranchProductStockModel;
use App\Models\UserModel;

class Products extends BaseController
{
    protected $productsModel;
    protected $branchProductStockData;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
        $this->branchProductStockData = new BranchProductStockModel();
    }
    public function index()
    {
        $allProducts = $this->productsModel->findAll();
        if(session()->get('num_user')['role'] == 'admin'){
            $products = $allProducts;
        } else {
            $products = $this->productsModel->getProduct();
        }
        
        $data = [
            'title' => 'Home | Supermarket System',
            'allProducts' => $allProducts,
            'products' => $products,
            'validation' => \Config\Services::validate()
        ];
        if(session()->get('num_user')['role'] == 'admin'){
            return view('/admin/products', $data);
        }
        return view('/branch/products', $data);
    }

    public function create() 
    {
        $data = [
            'title' => 'Add Product | Supermarket System',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/create', $data);
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
        }

        
        $kategori = $this->request->getVar('kategori');
        if($kategori == 'Minuman') {
            $namaGambar = 'https://utfs.io/f/36fde6e6-d4f6-42f0-bf83-562d4bffb10f-chvn70.png';
        } else if ($kategori == 'Daging') {
            $namaGambar = 'https://utfs.io/f/ee0df9c4-093f-45a4-9b6b-d78d2c5a337a-1zqvf.png';
        } else if ($kategori == 'Sayuran') {
            $namaGambar = 'https://utfs.io/f/337cdfc5-eddf-46bf-8af1-241a2ad6dba3-lwdt0h.png';
        } else if ($kategori == 'Buah') {
            $namaGambar = 'https://utfs.io/f/337cdfc5-eddf-46bf-8af1-241a2ad6dba3-lwdt0h.png';
        } else {
            $namaGambar = 'https://utfs.io/f/819422c2-88fa-4d95-8ba2-a464ae6de319-s71w0e.png';
        }


        if(session()->get('num_user')['role'] == 'admin'){
            $this->productsModel->save([
                'nama' => $this->request->getVar('nama'),
                'kategori' => $this->request->getVar('kategori'),
                'harga' => $this->request->getVar('harga'),
                'berat' => $this->request->getVar('berat'),
                'gambar' => $namaGambar,
            ]);

            $db = db_connect();
            $builder = $db->table('user');
            $builder->where("role != 'admin'");
            $branches = $builder->get()->getResultArray();
            $productId = $this->productsModel->getInsertID();
            
            foreach ($branches as $branch) {
                $branchProductStockData = [
                    'branch_id' => $branch['id'],
                    'product_id' => $productId,
                    'stok' => 0,
                ];
                $this->productsModel->insertBranchProductStock($branchProductStockData);
            }
        }
        
        session()->setFlashdata('pesan','Produk berhasil ditambahkan.');
        return redirect()->to(base_url('/products'));
    }

    public function delete($id)
    {
        $product = $this->productsModel->find($id);
        $this->productsModel->delete($id);
        session()->setFlashdata('pesan','Produk berhasil dihapus.');
        return redirect()->to(base_url('/products'));
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Product | Supermarket System',
            'product' => $this->productsModel->getProductById($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/edit', $data);
    }

    public function update($id)
    {
        // validasi input

        if(session()->get('num_user')['role'] == 'admin'){

            $produkLama = $this->productsModel->getProductById($id);
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
            }

            $kategori = $this->request->getVar('kategori');
            if($kategori == 'Minuman') {
                $namaGambar = 'https://utfs.io/f/36fde6e6-d4f6-42f0-bf83-562d4bffb10f-chvn70.png';
            } else if ($kategori == 'Daging') {
                $namaGambar = 'https://utfs.io/f/ee0df9c4-093f-45a4-9b6b-d78d2c5a337a-1zqvf.png';
            } else if ($kategori == 'Sayuran') {
                $namaGambar = 'https://utfs.io/f/337cdfc5-eddf-46bf-8af1-241a2ad6dba3-lwdt0h.png';
            } else if ($kategori == 'Buah') {
                $namaGambar = 'https://utfs.io/f/337cdfc5-eddf-46bf-8af1-241a2ad6dba3-lwdt0h.png';
            } else {
                $namaGambar = 'https://utfs.io/f/819422c2-88fa-4d95-8ba2-a464ae6de319-s71w0e.png';
            }
            $this->productsModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'kategori' => $this->request->getVar('kategori'),
                'harga' => $this->request->getVar('harga'),
                'berat' => $this->request->getVar('berat'),
                'gambar' => $namaGambar,
            ]);
        } 
        else {

            if(!$this->validate([
                'stok' => [
                    'rules' => 'required|is_natural',
                    'errors' => [
                        'required' => '{field} produk harus diisi.',
                        'is_natural' => '{field} produk harus bernilai positif.'
                    ]
                ],
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->back()->withInput()->with('validation', $validation);
                // return redirect()->to(base_url('edit/'.$id))->withInput();
            }
            // Ambil data stok baru dari form
            $newStock = $this->request->getVar('stok');
            // Ambil branch_id dari sesi atau dari data yang sesuai dengan struktur aplikasi Anda
            $branchId = session()->get('num_user')['id'];
            $data = $this->branchProductStockData->find([$branchId, $id]);

            if ($data) {
                // Data ditemukan, lakukan update
                $this->branchProductStockData
                    ->where(['branch_id' => $branchId, 'product_id' => $id])
                    ->set('stok', $newStock)
                    ->update();
            } else {
                // Data tidak ditemukan
                echo "Data not found.";
            }

        }
            session()->setFlashdata('pesan','Produk berhasil diubah.');

        return redirect()->to(base_url('/'));
    }
}