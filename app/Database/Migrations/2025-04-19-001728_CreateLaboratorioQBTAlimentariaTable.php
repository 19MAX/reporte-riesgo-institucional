<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaboratorioQBTAlimentariaTable extends Migration
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
            'valor_61' => ['type' => 'INT', 'constraint' => 11],
            'valor_62' => ['type' => 'INT', 'constraint' => 11],
            'valor_63' => ['type' => 'INT', 'constraint' => 11],
            'valor_64' => ['type' => 'INT', 'constraint' => 11],
            'valor_65' => ['type' => 'INT', 'constraint' => 11],
            'valor_66' => ['type' => 'INT', 'constraint' => 11],
            'valor_67' => ['type' => 'INT', 'constraint' => 11],
            'valor_68' => ['type' => 'INT', 'constraint' => 11],
            'valor_69' => ['type' => 'INT', 'constraint' => 11],
            'valor_70' => ['type' => 'INT', 'constraint' => 11],
            'valor_71' => ['type' => 'INT', 'constraint' => 11],
            'valor_72' => ['type' => 'INT', 'constraint' => 11],
            'B5' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('laboratorio_q_b_t_alimentaria');
    }

    public function down()
    {
        $this->forge->dropTable('laboratorio_q_b_t_alimentaria');
    }
}
