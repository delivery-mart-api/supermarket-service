<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBranchProductStockTable extends Migration
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
            'branch_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'stok' => [
                'type' => 'INT',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('branch_id', 'user', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->createTable('branch_product_stock');
    }

    public function down()
    {
        $this->forge->dropTable('branch_product_stock');
    }
}
