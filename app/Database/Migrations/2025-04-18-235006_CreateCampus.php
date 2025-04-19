<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCampus extends Migration
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
            'id_sede' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'direccion' => [
                'type' => 'TEXT',
            ],
            'canton' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'parroquia' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sede', 'sede', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('campus');
    }

    public function down()
    {
        $this->forge->dropTable('campus');
    }
}
