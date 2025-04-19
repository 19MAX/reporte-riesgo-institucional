<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrganizacionComiteTable extends Migration
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
            'valor_98' => ['type' => 'INT', 'constraint' => 11],
            'valor_99' => ['type' => 'INT', 'constraint' => 11],
            'valor_100' => ['type' => 'INT', 'constraint' => 11],
            'valor_101' => ['type' => 'INT', 'constraint' => 11],
            'valor_102' => ['type' => 'INT', 'constraint' => 11],
            'valor_103' => ['type' => 'INT', 'constraint' => 11],
            'valor_104' => ['type' => 'INT', 'constraint' => 11],
            'valor_105' => ['type' => 'INT', 'constraint' => 11],
            'C1' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sf', 'seguridad_funcional', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('organizacion_comite');
    }

    public function down()
    {
        $this->forge->dropTable('organizacion_comite');
    }

}
