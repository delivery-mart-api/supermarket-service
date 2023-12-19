<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchProductStockModel extends Model
{
    protected $table = 'branch_product_stock'; 
    protected $primaryKey = 'id';

    protected $allowedFields = ['branch_id', 'product_id', 'stok'];

    public function getStock($branchId, $productId)
    {
        return $this->where(['branch_id' => $branchId, 'product_id' => $productId])->first()['stok'] ?? 0;
    }

    public function saveProductToBranch($branchId, $productId)
    {
        $data = [
            'branch_id' => $branchId,
            'product_id' => $productId,
            'stok' => 0,
        ];
        return $this->save($data);
    }

    public function findStock($branchId, $productId)
    {
        return $this->where(['branch_id' => $branchId, 'product_id' => $productId])->first();
    }
}
