<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BranchProductStockSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'branch_id' => 1,
                'product_id' => 3,
                'stock_quantity' => 25,
            ],
            [
                'branch_id' => 1,
                'product_id' => 4,
                'stock_quantity' => 18,
            ],
            [
                'branch_id' => 2,
                'product_id' => 2,
                'stock_quantity' => 22,
            ],
            [
                'branch_id' => 2,
                'product_id' => 3,
                'stock_quantity' => 30,
            ],
            [
                'branch_id' => 2,
                'product_id' => 1,
                'stock_quantity' => 15,
            ],
            [
                'branch_id' => 2,
                'product_id' => 4,
                'stock_quantity' => 12,
            ],

        ];
        
        $this->db->table('branch_product_stock')->insertBatch($data);
    }
}
