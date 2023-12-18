<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 8,
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'berat' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => '5',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
