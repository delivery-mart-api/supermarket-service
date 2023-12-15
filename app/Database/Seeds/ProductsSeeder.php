<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Susu',
                'harga' => 10000,
                'stok' => 20,
                'berat' => 200,
                'gambar' => 'milk.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Air Mineral',
                'harga' => 15000,
                'stok' => 15,
                'berat' => 300,
                'gambar' => 'water-bottle.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Telur',
                'harga' => 20000,
                'stok' => 10,
                'berat' => 350,
                'gambar' => 'egg.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Sayur',
                'harga' => 12000,
                'stok' => 25,
                'berat' => 400,
                'gambar' => 'vegetable.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Daging Sapi',
                'harga' => 18000,
                'stok' => 18,
                'berat' => 490,
                'gambar' => 'beef.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
