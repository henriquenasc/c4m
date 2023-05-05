<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
            ],
            'avatar' => [
                'type'           => 'VARCHAR',
                'constraint'     => '240',
                'null'           => true,
                'default'        => null,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '240',
            ],
            'phone' => [
                'type'            => 'VARCHAR',
                'constraint'      => '20',
            ],
            'gender' => [
                'type'            => 'BOOLEAN',
                'null'            => true,
            ],
            'active' => [
                'type'            => 'BOOLEAN',
                'null'            => false,
                'default'         => 1,
            ],
            'date_of_birth' => [
                'type'            => 'DATETIME',
                'null'            => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
