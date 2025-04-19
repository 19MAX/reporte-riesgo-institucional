<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrabajoComunidadTable extends Migration
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
            'valor_139' => ['type' => 'INT', 'constraint' => 11],
            'valor_140' => ['type' => 'INT', 'constraint' => 11],
            'valor_141' => ['type' => 'INT', 'constraint' => 11],
            'valor_142' => ['type' => 'INT', 'constraint' => 11],
            'C5' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('trabajo_comunidad');
    }

    public function down()
    {
        $this->forge->dropTable('trabajo_comunidad');
    }
}
