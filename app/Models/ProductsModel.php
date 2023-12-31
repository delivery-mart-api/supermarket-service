<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'kategori', 'harga', 'stok', 'berat', 'gambar', 'created_by', 'created_at', 'updated_by', 'updated_at'
    ];
    // protected $returnType = 'App\Entities\Products';
    protected $useTimestamps = true;

    public function findById($id)
    {
        $data = $this->find($id);
        if($data)
        {
            return $data;
        }
        return false;
    }

    public function getProduct($id = false){
        $user = (session()->get('num_user'));
        $branchId = $user['id'];
        if($id == false) {
            // Query untuk mendapatkan produk berdasarkan cabang yang sedang login
            $query = $this->db->table('branch_product_stock')
                            ->select('products.id, products.nama, products.kategori, products.harga, branch_product_stock.stok, products.berat, products.gambar')
                            ->join('products', 'products.id = branch_product_stock.product_id')
                            ->where('branch_product_stock.branch_id', $branchId)
                            ->get();

            return $query->getResultArray();
        }
            // Query untuk mendapatkan produk berdasarkan cabang yang sedang login
            $query = $this->db->table('branch_product_stock')
                            ->select('products.id, products.nama, products.kategori, products.harga, branch_product_stock.stok, products.berat, products.gambar')
                            ->join('products', 'products.id = branch_product_stock.product_id')
                            ->where('branch_product_stock.branch_id', $branchId)
                            ->where('branch_product_stock.product_id', $id)
                            ->get();
    
            return $query->getResultArray()['0'];
    }

    public function getApiProducts($username)
    {
        // Ambil data produk
        $products = $this->asArray()->findAll();

        // Iterasi produk dan tambahkan atribut stok
        foreach ($products as &$product) {
            $productId = $product['id'];
            $branchId = $this->getBranchIdByUsername($username); // Gantilah dengan metode yang sesuai

            // Ambil stok dari branch_product_stock
            $stock = $this->getStockByProductIdAndBranchId($productId, $branchId);

            // Tambahkan atribut stok ke produk
            $product['stok'] = $stock;
        }

        return $products;
    }

    protected function getBranchIdByUsername($username)
    {
        // Implementasikan metode untuk mendapatkan ID cabang berdasarkan username
        // Misalnya, jika Anda memiliki tabel 'branch' dengan kolom 'username'
        $branch = $this->db->table('user')->where('username', $username)->get()->getRow();
        return $branch ? $branch->id : null;
    }

    protected function getStockByProductIdAndBranchId($productId, $branchId)
    {
        // Implementasikan metode untuk mendapatkan stok berdasarkan ID produk dan cabang
        // Misalnya, jika Anda memiliki tabel 'branch_product_stock' dengan kolom 'product_id', 'branch_id', dan 'stok'
        $stock = $this->db->table('branch_product_stock')
            ->where(['product_id' => $productId, 'branch_id' => $branchId])
            ->get()
            ->getRow();

        return $stock ? $stock->stok : 0;
    }

    public function getProductById($productId)
    {
        return $this->where('id', $productId)->first();
    }
    public function getUser($username, $password)
    {
        return $this->db->table('user')
                    ->where('username', $username)
                    ->where('password', $password)
                    ->get()
                    ->getRowArray();
    }

    public function getBranchById($branch_id)
    {
        return $this->db->table('branch_product_stock')
                    ->where('branch_id', $branch_id)
                    ->get()
                    ->getRowArray();
    }

    public function insertBranchProductStock($data)
    {
        $this->db->table('branch_product_stock')->insert($data);
    }
}