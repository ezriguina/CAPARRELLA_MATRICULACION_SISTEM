<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReduccionMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_reduccion' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'precio' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0.00,
            ],

            'documento' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id_reduccion', true);
        $this->forge->createTable('reducciones');
    }

    public function down()
    {
        $this->forge->dropTable('reducciones');
    }
}