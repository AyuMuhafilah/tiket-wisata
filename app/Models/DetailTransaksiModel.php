<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table            = 'detail_transaksi';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detail', 'id_transaksi', 'id_harga', 'jumlah_tiket'];


    public function getDetail($id)
    {
        return $this->select('detail_transaksi.jumlah_tiket, harga, jenis_tiket')
            ->where('id_transaksi', $id)
            ->join('harga_tiket', 'harga_tiket.id_harga = detail_transaksi.id_harga')
            ->findAll();
    }
}
