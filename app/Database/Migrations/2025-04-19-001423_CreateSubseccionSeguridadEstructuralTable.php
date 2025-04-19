<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubseccionSeguridadEstructuralTable extends Migration
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
            'id_se' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'valor_1' => ['type' => 'INT', 'constraint' => 11],
            'valor_2' => ['type' => 'INT', 'constraint' => 11],
            'valor_3' => ['type' => 'INT', 'constraint' => 11],
            'valor_4' => ['type' => 'INT', 'constraint' => 11],
            'valor_5' => ['type' => 'INT', 'constraint' => 11],
            'valor_6' => ['type' => 'INT', 'constraint' => 11],
            'valor_7' => ['type' => 'INT', 'constraint' => 11],
            'valor_8' => ['type' => 'INT', 'constraint' => 11],
            'valor_9' => ['type' => 'INT', 'constraint' => 11],
            'valor_10' => ['type' => 'INT', 'constraint' => 11],
            'valor_11' => ['type' => 'INT', 'constraint' => 11],
            'valor_12' => ['type' => 'INT', 'constraint' => 11],
            'valor_13' => ['type' => 'INT', 'constraint' => 11],
            'valor_14' => ['type' => 'INT', 'constraint' => 11],
            'valor_15' => ['type' => 'INT', 'constraint' => 11],
            'valor_16' => ['type' => 'INT', 'constraint' => 11],
            'valor_17' => ['type' => 'INT', 'constraint' => 11],
            'valor_18' => ['type' => 'INT', 'constraint' => 11],
            'valor_19' => ['type' => 'INT', 'constraint' => 11],
            'valor_20' => ['type' => 'INT', 'constraint' => 11],
            'valor_21' => ['type' => 'INT', 'constraint' => 11],
            'valor_22' => ['type' => 'INT', 'constraint' => 11],
            'valor_23' => ['type' => 'INT', 'constraint' => 11],
            'valor_24' => ['type' => 'INT', 'constraint' => 11],
            'valor_25' => ['type' => 'INT', 'constraint' => 11],
            'A' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_se', 'seguridad_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('subseccion_seguridad_estructural');
    }

    public function down()
    {
        $this->forge->dropTable('subseccion_seguridad_estructural');
    }
}
