<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvertirReduccionTable extends Migration
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
            'valor_134' => ['type' => 'INT', 'constraint' => 11],
            'valor_135' => ['type' => 'INT', 'constraint' => 11],
            'valor_136' => ['type' => 'INT', 'constraint' => 11],
            'valor_137' => ['type' => 'INT', 'constraint' => 11],
            'valor_138' => ['type' => 'INT', 'constraint' => 11],
            'C4' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('invertir_reduccion');
    }

    public function down()
    {
        $this->forge->dropTable('invertir_reduccion');
    }
}
