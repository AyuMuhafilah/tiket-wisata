<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wisata extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_wisata' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_admin' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'nama_wisata' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
                'null' => false,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id_wisata', true);
        $this->forge->addForeignKey('id_admin', 'user', 'id_user', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('wisata');
    }

    public function down()
    {
        $this->forge->dropTable('wisata');
    }
}
