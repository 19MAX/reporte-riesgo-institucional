<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsuarioInstituto extends Migration
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
            'id_usuario' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_instituto' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_usuario', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_instituto', 'IES', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('usuario_instituto');
    }

    public function down()
    {
        $this->forge->dropTable('usuario_instituto');
    }
}
