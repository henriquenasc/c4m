<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientsTable extends Migration
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
            'razao_social' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                'null' => false,
            ],
            'fantasia' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150',
                'null' => false,
            ],
            'cnpj_cpf' => [
                'type'           => 'VARCHAR',
                'constraint'     => '14',
                'null' => false,
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
        $this->forge->addKey("id", true);
        $this->forge->addUniqueKey("cnpj_cpf");
        $this->forge->createTable("clientes");
    }

    public function down()
    {
        //
    }
}
