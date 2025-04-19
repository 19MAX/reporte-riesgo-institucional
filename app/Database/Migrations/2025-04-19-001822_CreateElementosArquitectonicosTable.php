<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateElementosArquitectonicosTable extends Migration
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
            'valor_81' => ['type' => 'INT', 'constraint' => 11],
            'valor_82' => ['type' => 'INT', 'constraint' => 11],
            'valor_83' => ['type' => 'INT', 'constraint' => 11],
            'valor_84' => ['type' => 'INT', 'constraint' => 11],
            'valor_85' => ['type' => 'INT', 'constraint' => 11],
            'valor_86' => ['type' => 'INT', 'constraint' => 11],
            'valor_87' => ['type' => 'INT', 'constraint' => 11],
            'valor_88' => ['type' => 'INT', 'constraint' => 11],
            'valor_89' => ['type' => 'INT', 'constraint' => 11],
            'valor_90' => ['type' => 'INT', 'constraint' => 11],
            'valor_91' => ['type' => 'INT', 'constraint' => 11],
            'valor_92' => ['type' => 'INT', 'constraint' => 11],
            'valor_93' => ['type' => 'INT', 'constraint' => 11],
            'valor_94' => ['type' => 'INT', 'constraint' => 11],
            'valor_95' => ['type' => 'INT', 'constraint' => 11],
            'valor_96' => ['type' => 'INT', 'constraint' => 11],
            'valor_97' => ['type' => 'INT', 'constraint' => 11],
            'B7' => ['type' => 'DOUBLE', 'null' => true],
            'promedio' => ['type' => 'DOUBLE', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_sne', 'seguridad_no_estructural', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('elementos_arquitectonicos');
    }

    public function down()
    {
        $this->forge->dropTable('elementos_arquitectonicos');
    }
}
