<?php

namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model
{
    protected $table            = 'bank';
    protected $primaryKey       = 'id_bank';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_bank', 'id_admin', 'nama_bank', 'no_rek'];

    protected $validationRules = [
        'nama_bank' => 'required',
        'no_rek'    => 'required|max_length[20]|is_unique[bank.no_rek]'
    ];
    protected $validationMessages = [
        'nama_bank' => [
            'required' => 'Nama Bank Tidak Boleh Kosong',
        ],
        'no_rek' => [
            'required'   => 'Nomor Rekening Tidak Boleh Kosong',
            'max_length' => 'Nomor Rekening Maksimal 20 Digit',
            'is_unique'  => 'Nomor Rekening Sudah Terdaftar',
        ],
    ];

    public function setValidationRules($id = null)
    {
        if ($id) {
            $this->validationRules['no_rek'] = 'required|max_length[50]|is_unique[bank.no_rek,id_bank,' . $id . ']';
        } else {
            $this->validationRules['no_rek'] = 'required|max_length[50]|is_unique[bank.no_rek]';
        }
    }
}
