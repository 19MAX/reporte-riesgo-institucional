<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBienestarComunidadTable extends Migration
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
            'valor_155' => ['type' => 'INT', 'constraint' => 11],
            'valor_156' => ['type' => 'INT', 'constraint' => 11],
            'valor_157' => ['type' => 'INT', 'constraint' => 11],
            'C8' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('bienestar_comunidad');
    }

    public function down()
    {
        $this->forge->dropTable('bienestar_comunidad');
    }
}
