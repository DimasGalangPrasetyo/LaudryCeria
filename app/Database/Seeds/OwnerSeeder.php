<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OwnerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama'       => 'Owner Laundry Ceria',
            'username'   => 'owner',
            'email'      => 'owner@laundryceria.com',
            'password'   => password_hash('owner123', PASSWORD_DEFAULT),
            'role'       => 'owner',
            'status'     => 'aktif',
            'cabang_id'  => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}