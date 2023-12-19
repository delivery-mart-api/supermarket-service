<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => sha1('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'indoapril',
                'username' => 'indoapril',
                'password' => sha1('password'),
                'role' => 'branch'
            ]
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
