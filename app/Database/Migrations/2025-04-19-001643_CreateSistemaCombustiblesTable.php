<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSistemaCombustiblesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_sne' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'valor_49' => ['type' => 'INT', 'constraint' => 11],
            'valor_50' => ['type' => 'INT', 'constraint' => 11],
            'valor_51' => ['type' => 'INT', 'constraint' => 11],
            'valor_52' => ['type' => 'INT', 'constraint' => 11],
            'valor_53' => ['type' => 'INT', 'constraint' => 11],
            'valor_54' => ['type' => 'INT', 'constraint' => 11],
            'B3' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('sistema_de_combustibles');
    }

    public function down()
    {
        $this->forge->dropTable('sistema_de_combustibles');
    }
}
