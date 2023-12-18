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
                'product_id' => 3,
                'stok' => 25,
            ],
            [
                'branch_id' => 2,
                'product_id' => 4,
                'stok' => 18,
            ],
            [
                'branch_id' => 2,
                'product_id' => 2,
                'stok' => 22,
            ],
            [
                'branch_id' => 3,
                'product_id' => 3,
                'stok' => 30,
            ],
            [
                'branch_id' => 3,
                'product_id' => 1,
                'stok' => 15,
            ],
            [
                'branch_id' => 3,
                'product_id' => 4,
                'stok' => 12,
            ],

        ];
        
        $this->db->table('branch_product_stock')->insertBatch($data);
    }
}
