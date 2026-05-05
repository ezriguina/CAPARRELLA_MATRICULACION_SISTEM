<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CursSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'Nom_curs'    => 'Desarrollo Web con PHP',
                'codigo_curs' => 'PHP001',
                'precio'      => 120.50,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'Nom_curs'    => 'Introducción a JavaScript',
                'codigo_curs' => 'JS001',
                'precio'      => 90.00,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'Nom_curs'    => 'Framework CodeIgniter 4',
                'codigo_curs' => 'CI4001',
                'precio'      => 150.75,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'Nom_curs'    => 'Bases de Datos MySQL',
                'codigo_curs' => 'MYSQL001',
                'precio'      => 110.00,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('curs')->insertBatch($data);
    }
}