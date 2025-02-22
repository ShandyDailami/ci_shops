<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $user_data = [
            [
                'username' => 'agus',
                'password' => password_hash('agus123', PASSWORD_DEFAULT),
                'role' => 'cashier',
            ]
        ];

        foreach ($user_data as $data) {
            $this->db->table('users')->insert($data);
        }
    }
}
