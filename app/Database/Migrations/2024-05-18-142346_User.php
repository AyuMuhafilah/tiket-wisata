<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => false,
                'unique'         => true
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => false,
            ],
            'no_hp' => [
                'type'           => 'CHAR',
                'constraint'     => 15,
                'null'           => false,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
            ],
            'alamat' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'profile' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => true,
            ],
            'role' => [
                'type'           => 'ENUM',
                'constraint'     => ['super_user', 'admin', 'wisatawan'],
                'null'           => false,
                'default'        => 'wisatawan',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => false,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => false,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
