<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'       => 'Admin',
                'email'      => 'admin@test.com',
                'password'   => password_hash('123456', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'active'  => 1,
            ],
            [
                'name'       => 'Secretary',
                'email'      => 'secretary@test.com',
                'password'   => password_hash('123456', PASSWORD_DEFAULT),
                'role'       => 'secretary',
                'active'  => 1,
            ],
            [
                'name'       => 'User',
                'email'      => 'user@test.com',
                'password'   => password_hash('123456', PASSWORD_DEFAULT),
                'role'       => 'user',
                'active'  => 1,
            ]
        ];

        $this->db->table('usuarios')->insertBatch($data);
    }
}