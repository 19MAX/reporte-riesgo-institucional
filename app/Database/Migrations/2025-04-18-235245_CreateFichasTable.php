<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFichasTable extends Migration
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
            'id_campus' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_se' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_sne' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_sf' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_sa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'fecha' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_campus', 'campus', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('id_se', 'seguridad_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('id_sf', 'seguridad_funcional', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('id_sa', 'seguridad_administrativa', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('fichas');
    }

    public function down()
    {
        $this->forge->dropTable('fichas');
    }
}
