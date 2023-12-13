<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'harga', 'stok', 'berat', 'created_by', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $returnType = 'App\Entities\Products';
    protected $useTimestamps = false;

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