<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BranchProductStockSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'branch_id' => 2,
                'product_id' => 1,
                'stok' => 25,
            ],
            [
                'branch_id' => 2,
                'product_id' => 2,
                'stok' => 18,
            ],
            [
                'branch_id' => 2,
                'product_id' => 3,
                'stok' => 22,
            ],
            [
                'branch_id' => 2,
                'product_id' => 4,
                'stok' => 30,
            ],
            [
                'branch_id' => 2,
                'product_id' => 5,
                'stok' => 15,
            ],
        ];
        
        $this->db->table('branch_product_stock')->insertBatch($data);
    }
}
