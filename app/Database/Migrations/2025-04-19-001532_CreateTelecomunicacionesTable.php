<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTelecomunicacionesTable extends Migration
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
            'valor_34' => ['type' => 'INT', 'constraint' => 11],
            'valor_35' => ['type' => 'INT', 'constraint' => 11],
            'valor_36' => ['type' => 'INT', 'constraint' => 11],
            'valor_37' => ['type' => 'INT', 'constraint' => 11],
            'valor_38' => ['type' => 'INT', 'constraint' => 11],
            'valor_39' => ['type' => 'INT', 'constraint' => 11],
            'valor_40' => ['type' => 'INT', 'constraint' => 11],
            'valor_41' => ['type' => 'INT', 'constraint' => 11],
            'B2' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('telecomunicaciones');
    }

    public function down()
    {
        $this->forge->dropTable('telecomunicaciones');
    }
}
