<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCapacitaPersonalTable extends Migration
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
            'id_sa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'valor_146' => ['type' => 'INT', 'constraint' => 11],
            'valor_147' => ['type' => 'INT', 'constraint' => 11],
            'valor_148' => ['type' => 'INT', 'constraint' => 11],
            'valor_149' => ['type' => 'INT', 'constraint' => 11],
            'C6' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('capacita_personal');
    }

    public function down()
    {
        $this->forge->dropTable('capacita_personal');
    }
}
