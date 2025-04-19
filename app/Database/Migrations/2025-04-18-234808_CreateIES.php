<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIES extends Migration
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
            'codigo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'provincia' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'canton' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'parroquia' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'direccion' => [
                'type' => 'TEXT',
            ],
            'acreditacion' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'region' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'zona' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'logo' => [
                'type' => 'TEXT',
            ],
            'cord_x' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'cord_y' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('IES');
    }

    public function down()
    {
        $this->forge->dropTable('IES');
    }
}
