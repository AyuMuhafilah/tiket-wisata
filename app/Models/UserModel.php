<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'username', 'password', 'nama', 'no_hp', 'email', 'alamat', 'profile', 'role'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'username' => 'required|max_length[50]|is_unique[user.username]',
        'password' => 'required|min_length[8]',
        'nama'     => 'required|max_length[100]',
        'no_hp'    => 'required|is_natural|max_length[15]|is_unique[user.no_hp]',
        'email'    => 'required|valid_email|max_length[50]',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Username Tidak Boleh Kosong',
            'max_length' => 'Username maksimal 50 Karakter',
            'is_unique' => 'Username sudah digunakan',
        ],
        'password' => [
            'required' => 'Password Tidak Boleh Kosong',
            'min_length' => 'Password minimal 8 Karakter',
        ],
        'nama' => [
            'required' => 'Nama Tidak Boleh Kosong',
            'max_length' => 'Nama maksimal 100 Karakter',
        ],
        'email' => [
            'required' => 'Email Tidak Boleh Kosong',
            'valid_email' => 'Email Tidak Sesuai',
            'max_length' => 'Email maksimal 50 Karakter',
        ],
        'no_hp' => [
            'required' => 'No Hp Tidak Boleh Kosong',
            'is_natural' => 'No Hp harus berupa angka',
            'max_length' => 'No Hp maksimal 15 angka',
            'is_unique' => 'No Hp sudah terdaftar',
        ],
    ];

    public function setValidationRules($id = null)
    {
        if ($id) {
            $this->validationRules['username'] = 'required|max_length[50]|is_unique[user.username,id_user,' . $id . ']';
            $this->validationRules['no_hp'] = 'required|is_natural|max_length[15]|is_unique[user.no_hp,id_user,' . $id . ']';
        } else {
            $this->validationRules['username'] = 'required|max_length[50]|is_unique[user.username]';
            $this->validationRules['no_hp'] = 'required|is_natural|max_length[15]|is_unique[user.no_hp]';
        }
    }

    public function getUser($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getAdmin()
    {
        $subquery = $this->db->table('wisata')->select('id_admin')->getCompiledSelect();
        return $this->where('role', 'admin')
            ->where("id_user NOT IN ($subquery)", null, false)
            ->findAll();
    }
}
