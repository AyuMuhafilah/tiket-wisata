<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{
    protected $table            = 'wisata';
    protected $primaryKey       = 'id_wisata';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_wisata', 'nama_wisata', 'id_admin', 'deskripsi', 'gambar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'nama_wisata' => 'required',
        'id_admin'    => 'required',
        'deskripsi'   => 'required'
    ];

    protected $validationMessages = [
        'nama_wisata' => [
            'required' => 'Nama wisata wajib diisi.'
        ],
        'id_admin' => [
            'required' => 'Nama admin wajib dipilih.'
        ],
        'deskripsi' => [
            'required' => 'Deskripsi wajib diisi.'
        ]
    ];

    function getJoinWisata()
    {
        return $this->select('wisata.*, user.nama')
            ->join('user', 'user.id_user = wisata.id_admin')
            ->findAll();
    }

    function getJoinWisataId($id)
    {
        return $this->select('wisata.*, user.nama')
            ->where('id_wisata', $id)
            ->join('user', 'user.id_user = wisata.id_admin')
            ->first();
    }

    function getAdminWisata($id_admin)
    {
        return $this->where('id_admin', $id_admin)->first();
    }
}
