<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HargaTiket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_harga' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_wisata' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'jenis_tiket' => [
                'type'       => 'ENUM',
                'constraint' => ['Dewasa', 'Anak - Anak'],
                'null' => false,
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '7,0',
                'null' => false,
            ],
            'tgl_mulai' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tgl_selesai' => [
                'type' => 'DATE',
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
        $this->forge->addKey('id_harga', true);
        $this->forge->addForeignKey('id_wisata', 'wisata', 'id_wisata', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('harga_tiket');
    }

    public function down()
    {
        $this->forge->dropTable('harga_tiket');
    }
}
