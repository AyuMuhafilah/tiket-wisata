<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'CHAR',
                'constraint'     => 20,
            ],
            'id_wisatawan'   => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'id_wisata'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'tgl_transaksi'  => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'total_tiket'    => [
                'type'       => 'INT',
                'constraint' => 2,
                'null'       => false,
            ],
            'total_bayar'    => [
                'type'       => 'DECIMAL',
                'constraint' => '10,0',
                'null'       => false,
            ],
            'bukti_bayar'    => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'status'    => [
                'type'       => 'ENUM',
                'constraint' => ['Diproses', 'Selesai', 'Ditolak'],
                'default'    => 'Diproses',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_transaksi', true);
        $this->forge->addForeignKey('id_wisatawan', 'user', 'id_user', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('id_wisata', 'wisata', 'id_wisata', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('transaksi');

        $this->forge->addField([
            'id_detail'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_transaksi'   => [
                'type'       => 'CHAR',
                'constraint' => 20,
                'null'       => false,
            ],
            'id_harga'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'jumlah_tiket'    => [
                'type'       => 'INT',
                'constraint' => 2,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id_transaksi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('detail_transaksi');
        $this->forge->dropTable('transaksi');
    }
}
