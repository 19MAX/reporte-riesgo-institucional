<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSede extends Migration
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
            'id_IES' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'direccion' => [
                'type' => 'TEXT',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_IES', 'IES', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sede');
    }

    public function down()
    {
        $this->forge->dropTable('sede');
    }
}
