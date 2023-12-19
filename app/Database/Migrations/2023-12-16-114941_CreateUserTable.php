<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
            ],
            'name' => [
                'type'           => 'VARCHAR',
				'constraint'     => 50
            ],
            'username' => [
                'type'           => 'VARCHAR',
				'constraint'     => 30
            ],
            'password' => [
                'type'           => 'VARCHAR',
				'constraint'     => 80
            ],
            'role' => [
                'type'           => 'VARCHAR',
				'constraint'     => 25
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}