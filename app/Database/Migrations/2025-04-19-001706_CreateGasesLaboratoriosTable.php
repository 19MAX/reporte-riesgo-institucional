<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGasesLaboratoriosTable extends Migration
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
            'valor_55' => ['type' => 'INT', 'constraint' => 11],
            'valor_56' => ['type' => 'INT', 'constraint' => 11],
            'valor_57' => ['type' => 'INT', 'constraint' => 11],
            'valor_58' => ['type' => 'INT', 'constraint' => 11],
            'valor_59' => ['type' => 'INT', 'constraint' => 11],
            'valor_60' => ['type' => 'INT', 'constraint' => 11],
            'B4' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('gases_de_laboratorios');
    }

    public function down()
    {
        $this->forge->dropTable('gases_de_laboratorios');
    }
}
