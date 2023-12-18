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
                'gambar' => 'https://utfs.io/f/819422c2-88fa-4d95-8ba2-a464ae6de319-s71w0e.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Air Mineral',
                'kategori' => 'Minuman',
                'harga' => 15000,
                'stok' => 15,
                'berat' => 300,
                'gambar' => 'https://utfs.io/f/36fde6e6-d4f6-42f0-bf83-562d4bffb10f-chvn70.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Daging Sapi',
                'kategori' => 'Daging',
                'harga' => 20000,
                'stok' => 10,
                'berat' => 350,
                'gambar' => 'https://utfs.io/f/ee0df9c4-093f-45a4-9b6b-d78d2c5a337a-1zqvf.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Wortel',
                'kategori' => 'Sayuran',
                'harga' => 12000,
                'stok' => 25,
                'berat' => 400,
                'gambar' => 'https://utfs.io/f/337cdfc5-eddf-46bf-8af1-241a2ad6dba3-lwdt0h.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'Apel',
                'kategori' => 'Buah',
                'harga' => 18000,
                'stok' => 18,
                'berat' => 490,
                'gambar' => 'https://utfs.io/f/337cdfc5-eddf-46bf-8af1-241a2ad6dba3-lwdt0h.png',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
