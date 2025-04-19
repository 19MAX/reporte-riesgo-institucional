<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSistemaProvisionAguaTable extends Migration
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
            'valor_42' => ['type' => 'INT', 'constraint' => 11],
            'valor_43' => ['type' => 'INT', 'constraint' => 11],
            'valor_44' => ['type' => 'INT', 'constraint' => 11],
            'valor_45' => ['type' => 'INT', 'constraint' => 11],
            'valor_46' => ['type' => 'INT', 'constraint' => 11],
            'valor_47' => ['type' => 'INT', 'constraint' => 11],
            'valor_48' => ['type' => 'INT', 'constraint' => 11],
            'B3' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('sistema_de_provision_de_agua');
    }

    public function down()
    {
        $this->forge->dropTable('sistema_de_provision_de_agua');
    }
}
