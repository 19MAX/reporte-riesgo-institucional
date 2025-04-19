<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMejorasContinuasTable extends Migration
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
            'valor_158' => ['type' => 'INT', 'constraint' => 11],
            'valor_159' => ['type' => 'INT', 'constraint' => 11],
            'valor_160' => ['type' => 'INT', 'constraint' => 11],
            'valor_161' => ['type' => 'INT', 'constraint' => 11],
            'C9' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('mejoras_continuas');
    }

    public function down()
    {
        $this->forge->dropTable('mejoras_continuas');
    }
}
