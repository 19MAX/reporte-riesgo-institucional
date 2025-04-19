<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrabajoMultidisciplinarioTable extends Migration
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
            'valor_143' => ['type' => 'INT', 'constraint' => 11],
            'valor_144' => ['type' => 'INT', 'constraint' => 11],
            'valor_145' => ['type' => 'INT', 'constraint' => 11],
            'C_5' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('trabajo_multidisciplinario');
    }

    public function down()
    {
        $this->forge->dropTable('trabajo_multidisciplinario');
    }
}
