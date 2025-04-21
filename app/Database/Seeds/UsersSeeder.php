<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email'      => 'admin@admin.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'nombres'    => 'Admin',
                'apellidos'  => 'Principal',
                'cedula'     => '1000000001',
                'id_campus'  => null,
                'rol'        => '1',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'email'      => 'supervisor@example.com',
                'password'   => password_hash('password', PASSWORD_DEFAULT),
                'nombres'    => 'Supervisor',
                'apellidos'  => 'General',
                'cedula'     => '1000000002',
                'id_campus'  => null,
                'rol'        => '2',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            // [
            //     'email'      => 'analista@example.com',
            //     'password'   => password_hash('analista123', PASSWORD_DEFAULT),
            //     'nombres'    => 'Analista',
            //     'apellidos'  => 'Operativo',
            //     'cedula'     => '1000000003',
            //     'id_campus'  => 3,
            //     'rol'        => '3',
            //     'created_at' => date('Y-m-d H:i:s'),
            // ],
        ];

        // Insertar los datos
        $this->db->table('users')->insertBatch($data);
    }
}
