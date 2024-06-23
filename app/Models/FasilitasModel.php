<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table            = 'fasilitas';
    protected $primaryKey       = 'id_fasilitas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_fasilitas', 'id_admin', 'nama_fasilitas'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'nama_fasilitas' => 'required'
    ];

    protected $validationMessages = [
        'nama_fasilitas' => [
            'required' => 'Nama Fasilitas Tidak Boleh Kosong',
        ],
    ];

    function getFasilitasWisata($id_admin)
    {
        return $this->select('id_fasilitas, nama_fasilitas')
            ->where('id_admin', $id_admin)->findAll();
    }
}
