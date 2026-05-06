<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BonificacionMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bonificacion' => [
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

            'id_curso' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
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

        $this->forge->addKey('id_bonificacion', true);

        $this->forge->addKey('id_curso');

        $this->forge->createTable('bonificaciones');
    }

    public function down()
    {
        $this->forge->dropTable('bonificaciones');
    }
}