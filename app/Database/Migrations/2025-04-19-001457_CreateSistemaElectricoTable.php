<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSistemaElectricoTable extends Migration
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
            'valor_26' => ['type' => 'INT', 'constraint' => 11],
            'valor_27' => ['type' => 'INT', 'constraint' => 11],
            'valor_28' => ['type' => 'INT', 'constraint' => 11],
            'valor_29' => ['type' => 'INT', 'constraint' => 11],
            'valor_30' => ['type' => 'INT', 'constraint' => 11],
            'valor_31' => ['type' => 'INT', 'constraint' => 11],
            'valor_32' => ['type' => 'INT', 'constraint' => 11],
            'valor_33' => ['type' => 'INT', 'constraint' => 11],
            'valor_34' => ['type' => 'INT', 'constraint' => 11],
            'valor_35' => ['type' => 'INT', 'constraint' => 11],
            'B1' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('sistema_electrico');
    }

    public function down()
    {
        $this->forge->dropTable('sistema_electrico');
    }
}
