<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'harga', 'stok', 'berat', 'gambar', 'created_by', 'created_at', 'updated_by', 'updated_at'
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
}