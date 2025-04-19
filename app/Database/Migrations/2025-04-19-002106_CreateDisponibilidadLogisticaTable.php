<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDisponibilidadLogisticaTable extends Migration
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
            'id_sf' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'valor_128' => ['type' => 'INT', 'constraint' => 11],
            'valor_129' => ['type' => 'INT', 'constraint' => 11],
            'valor_130' => ['type' => 'INT', 'constraint' => 11],
            'valor_131' => ['type' => 'INT', 'constraint' => 11],
            'valor_132' => ['type' => 'INT', 'constraint' => 11],
            'valor_133' => ['type' => 'INT', 'constraint' => 11],
            'C3' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sf', 'seguridad_funcional', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('disponibilidad_logistica');
    }

    public function down()
    {
        $this->forge->dropTable('disponibilidad_logistica');
    }
}
