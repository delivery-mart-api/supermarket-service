<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Sabun',
                'kategori' => 'Peralatan Mandi',
                'harga' => 10000,
                'stok' => 20,
                'berat' => 200,
                'gambar' => 'toiletries.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Air Mineral',
                'kategori' => 'Minuman',
                'harga' => 15000,
                'stok' => 15,
                'berat' => 300,
                'gambar' => 'beverages.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Daging Sapi',
                'kategori' => 'Daging',
                'harga' => 20000,
                'stok' => 10,
                'berat' => 350,
                'gambar' => 'beef.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Wortel',
                'kategori' => 'Sayuran',
                'harga' => 12000,
                'stok' => 25,
                'berat' => 400,
                'gambar' => 'vegetable.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Apel',
                'kategori' => 'Buah',
                'harga' => 18000,
                'stok' => 18,
                'berat' => 490,
                'gambar' => 'fruits.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
