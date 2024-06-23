<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Harga extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_wisata'      => '1',
                'jenis_tiket'    => 'Dewasa',
                'harga'          => 30000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '1',
                'jenis_tiket'    => 'Anak - Anak',
                'harga'          => 25000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '2',
                'jenis_tiket'    => 'Dewasa',
                'harga'          => 25000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '2',
                'jenis_tiket'    => 'Anak - Anak',
                'harga'          => 20000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '3',
                'jenis_tiket'    => 'Dewasa',
                'harga'          => 20000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '3',
                'jenis_tiket'    => 'Anak - Anak',
                'harga'          => 15000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '4',
                'jenis_tiket'    => 'Dewasa',
                'harga'          => 30000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '4',
                'jenis_tiket'    => 'Anak - Anak',
                'harga'          => 25000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '5',
                'jenis_tiket'    => 'Dewasa',
                'harga'          => 30000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '5',
                'jenis_tiket'    => 'Anak - Anak',
                'harga'          => 25000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '6',
                'jenis_tiket'    => 'Dewasa',
                'harga'          => 25000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'id_wisata'      => '6',
                'jenis_tiket'    => 'Anak - Anak',
                'harga'          => 20000,
                'tgl_mulai'      => '2024-06-01',
                'tgl_selesai'    => '2024-06-30',
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('harga_tiket')->insertBatch($data);
    }
}
