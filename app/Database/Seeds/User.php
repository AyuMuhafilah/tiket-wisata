<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'super',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Super User',
                'no_hp'      => '081234567890',
                'email'      => 'super@example.com',
                'role'       => 'super_user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'wisatawan',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Ayu Muhafilah',
                'no_hp'      => '081234567892',
                'email'      => 'ayumuhafilah10@gmail.com',
                'role'       => 'wisatawan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin1',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567891',
                'email'      => 'admin1@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin2',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567892',
                'email'      => 'admin2@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin3',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567893',
                'email'      => 'admin3@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin4',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567894',
                'email'      => 'admin4@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin5',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567895',
                'email'      => 'admin5@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin6',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567896',
                'email'      => 'admin6@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin7',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567897',
                'email'      => 'admin7@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin8',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567898',
                'email'      => 'admin8@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'admin9',
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'nama'       => 'Admin',
                'no_hp'      => '081234567899',
                'email'      => 'admin9@example.com',
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
