<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEfectosNegativosTable extends Migration
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
            'valor_150' => ['type' => 'INT', 'constraint' => 11],
            'valor_151' => ['type' => 'INT', 'constraint' => 11],
            'valor_152' => ['type' => 'INT', 'constraint' => 11],
            'valor_153' => ['type' => 'INT', 'constraint' => 11],
            'valor_154' => ['type' => 'INT', 'constraint' => 11],
            'C7' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('efectos_negativos');
    }

    public function down()
    {
        $this->forge->dropTable('efectos_negativos');
    }
}
