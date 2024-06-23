<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_transaksi', 'id_wisatawan', 'id_wisata', 'tgl_transaksi', 'total_tiket', 'total_bayar', 'bukti_bayar', 'status'];

    public function getTransaksi($id_wisata, $status = true)
    {
        $query = $this->select('transaksi.*, nama')
            ->where('id_wisata', $id_wisata)
            ->join('user', 'user.id_user = transaksi.id_wisatawan');
        if ($status === true) {
            $query->where('status', 'diproses');
            $query->orderBy('tgl_transaksi', 'asc');
        } else {
            $query->orderBy('tgl_transaksi', 'desc');
            $query->where('status !=', 'diproses');
        }

        return $query->findAll();
    }

    public function getTransaksiById($id)
    {
        return $this->select('transaksi.*, nama, no_hp, email, nama_wisata')
            ->where('id_transaksi', $id)
            ->join('wisata', 'wisata.id_wisata = transaksi.id_wisata')
            ->join('user', 'transaksi.id_wisatawan = user.id_user')
            ->first();
    }

    public function getPengunjung($id_wisata, $mulai, $selesai)
    {
        return $this->select('transaksi.*, nama, no_hp, email')
            ->join('user', 'user.id_user = transaksi.id_wisatawan')
            ->where('id_wisata', $id_wisata)
            ->where('tgl_transaksi >=', $mulai)
            ->where('tgl_transaksi <=', $selesai)
            ->findAll();
    }
}
