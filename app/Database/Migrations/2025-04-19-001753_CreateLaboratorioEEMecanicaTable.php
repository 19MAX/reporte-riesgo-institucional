<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaboratorioEEMecanicaTable extends Migration
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
            'valor_73' => ['type' => 'INT', 'constraint' => 11],
            'valor_74' => ['type' => 'INT', 'constraint' => 11],
            'valor_75' => ['type' => 'INT', 'constraint' => 11],
            'valor_76' => ['type' => 'INT', 'constraint' => 11],
            'valor_77' => ['type' => 'INT', 'constraint' => 11],
            'valor_78' => ['type' => 'INT', 'constraint' => 11],
            'valor_79' => ['type' => 'INT', 'constraint' => 11],
            'valor_80' => ['type' => 'INT', 'constraint' => 11],
            'B6' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('laboratorio_e_e_mecanica');
    }

    public function down()
    {
        $this->forge->dropTable('laboratorio_e_e_mecanica');
    }
}
