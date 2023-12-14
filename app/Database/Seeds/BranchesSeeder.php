<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BranchesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_cabang' => 'Cabang 1',
                'username' => 'cabang1',
                'password' => password_hash('password1', PASSWORD_DEFAULT),
            ],
            [
                'nama_cabang' => 'Cabang 2',
                'username' => 'cabang2',
                'password' => password_hash('password2', PASSWORD_DEFAULT),
            ],
        ];

        $this->db->table('branches')->insertBatch($data);
    }
}
