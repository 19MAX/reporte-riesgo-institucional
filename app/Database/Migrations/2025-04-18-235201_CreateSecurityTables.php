<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSecurityTables extends Migration
{
public function up()
    {
        // Seguridad estructural
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
            ],
            'id_analista' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'promedio' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_campus', 'campus', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_analista', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('seguridad_estructural');

        // Seguridad no estructural
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
            ],
            'id_analista' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'promedio' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_campus', 'campus', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_analista', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('seguridad_no_estructural');

        // Seguridad funcional
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
            ],
            'id_analista' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'promedio' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_campus', 'campus', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_analista', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('seguridad_funcional');

        // Seguridad administrativa
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
            ],
            'id_analista' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'promedio' => [
                'type' => 'DOUBLE',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_campus', 'campus', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_analista', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('seguridad_administrativa');
    }

    public function down()
    {
        $this->forge->dropTable('seguridad_administrativa');
        $this->forge->dropTable('seguridad_funcional');
        $this->forge->dropTable('seguridad_no_estructural');
        $this->forge->dropTable('seguridad_estructural');
    }

}
