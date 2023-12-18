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
                            ->select('products.id, products.nama, products.kategori, products.harga, branch_product_stock.stock_quantity, products.berat, products.gambar')
                            ->join('products', 'products.id = branch_product_stock.product_id')
                            ->where('branch_product_stock.branch_id', $branchId)
                            ->get();

            return $query->getResultArray();
        }
            // Query untuk mendapatkan produk berdasarkan cabang yang sedang login
            $query = $this->db->table('branch_product_stock')
                            ->select('products.id, products.nama, products.kategori, products.harga, branch_product_stock.stock_quantity, products.berat, products.gambar')
                            ->join('products', 'products.id = branch_product_stock.product_id')
                            ->where('branch_product_stock.branch_id', $branchId)
                            ->where('branch_product_stock.product_id', $id)
                            ->get();
    
            return $query->getResultArray()['0'];
    }

    public function getApiProducts($username) {
        if ($username) {
            $query = $this->db->table('branch_product_stock')
                            ->select('products.id, products.nama, products.kategori, products.harga, branch_product_stock.stock_quantity, products.berat, products.gambar')
                            ->join('products', 'products.id = branch_product_stock.product_id')
                            ->join('user', 'user.id = branch_product_stock.branch_id')
                            ->where('user.username', $username)
                            ->get();

            return $query->getResultArray();
         }
    }

    public function getUserByUsername($username)
    {
        return $this->db->table('user')
                    ->where('username', $username)
                    ->get()
                    ->getRowArray();
    }
}