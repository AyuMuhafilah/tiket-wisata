<?php

namespace App\Models;

use CodeIgniter\Model;

class HargaTiketModel extends Model
{
    protected $table            = 'harga_tiket';
    protected $primaryKey       = 'id_harga';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_wisata', 'jenis_tiket', 'harga', 'tgl_mulai', 'tgl_selesai'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function getHargaAll($id_wisata)
    {
        $currentDate = date('Y-m-d');
        return $this->where('id_wisata', $id_wisata)
            ->where('tgl_mulai <=', $currentDate)
            ->where('tgl_selesai >=', $currentDate)
            ->findAll();
    }

    function getHargaTiket($id_wisata)
    {
        $currentDate = date('Y-m-d');
        return $this->where('id_wisata', $id_wisata)
            ->where('jenis_tiket', 'dewasa')
            ->where('tgl_mulai <=', $currentDate)
            ->where('tgl_selesai >=', $currentDate)
            ->first();
    }
}
