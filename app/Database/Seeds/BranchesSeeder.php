<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BranchesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_cabang' => 'Indoapril',
                'username' => 'indoapril',
                'password' => password_hash('password', PASSWORD_DEFAULT),
            ],
        ];

        $this->db->table('branches')->insertBatch($data);
    }
}
