<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Produk 1',
                'harga' => 10000,
                'stok' => 20,
                'berat' => 200,
                'created_date' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Produk 2',
                'harga' => 15000,
                'stok' => 15,
                'berat' => 300,
                'created_date' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Produk 3',
                'harga' => 20000,
                'stok' => 10,
                'berat' => 350,
                'created_date' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Produk 4',
                'harga' => 12000,
                'stok' => 25,
                'berat' => 400,
                'created_date' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Produk 5',
                'harga' => 18000,
                'stok' => 18,
                'berat' => 490,
                'created_date' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
