<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProcedimientosOperativosTable extends Migration
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
            'valor_106' => ['type' => 'INT', 'constraint' => 11],
            'valor_107' => ['type' => 'INT', 'constraint' => 11],
            'valor_108' => ['type' => 'INT', 'constraint' => 11],
            'valor_109' => ['type' => 'INT', 'constraint' => 11],
            'valor_110' => ['type' => 'INT', 'constraint' => 11],
            'valor_111' => ['type' => 'INT', 'constraint' => 11],
            'valor_112' => ['type' => 'INT', 'constraint' => 11],
            'valor_113' => ['type' => 'INT', 'constraint' => 11],
            'valor_114' => ['type' => 'INT', 'constraint' => 11],
            'valor_115' => ['type' => 'INT', 'constraint' => 11],
            'valor_116' => ['type' => 'INT', 'constraint' => 11],
            'valor_117' => ['type' => 'INT', 'constraint' => 11],
            'valor_118' => ['type' => 'INT', 'constraint' => 11],
            'valor_119' => ['type' => 'INT', 'constraint' => 11],
            'valor_120' => ['type' => 'INT', 'constraint' => 11],
            'valor_121' => ['type' => 'INT', 'constraint' => 11],
            'valor_122' => ['type' => 'INT', 'constraint' => 11],
            'valor_123' => ['type' => 'INT', 'constraint' => 11],
            'valor_124' => ['type' => 'INT', 'constraint' => 11],
            'valor_125' => ['type' => 'INT', 'constraint' => 11],
            'valor_126' => ['type' => 'INT', 'constraint' => 11],
            'valor_127' => ['type' => 'INT', 'constraint' => 11],
            'C2' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sf', 'seguridad_funcional', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('procedimientos_operativos');
    }

    public function down()
    {
        $this->forge->dropTable('procedimientos_operativos');
    }
}
