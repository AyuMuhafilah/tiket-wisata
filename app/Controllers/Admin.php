<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->home = new Home();
        $this->admin = new UserModel();
    }
    public function index()
    {
        $user = session()->get('user');
        $nama = $this->home->getName();
        $admin = $this->admin->where(['role' => 'admin'])->findAll();
        $data = [
            'user'      => $user,
            'nama'      => $nama,
            'admin'     => $admin,
            'errors' => session()->get('errors', []),
        ];
        return view('adminpage/admin/index', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id_user');
        $data = [
            'username' => $this->request->getPost('no_hp'),
            'password' => password_hash($this->request->getPost('12345678'), PASSWORD_DEFAULT),
            'nama'     => $this->request->getPost('nama'),
            'no_hp'    => $this->request->getPost('no_hp'),
            'email'    => $this->request->getPost('email'),
            'alamat'   => $this->request->getPost('alamat'),
            'role'     => 'admin',
        ];
        $this->admin->setValidationRules($id);
        if (!$this->admin->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $this->admin->errors());
        }
        if (empty($id)) {
            $simpan = $this->admin->insert($data);
            if ($simpan) {
                $this->home->toast('success', 'Admin Berhasil Disimpan');
            } else {
            }
        } else {
            unset($data['username'], $data['password'], $data['role']);
            $update = $this->admin->update($id, $data);
            if ($update) {
                $this->home->toast('success', 'Admin Berhasil Diupdate');
            } else {
                $this->home->toast('error', 'Admin Gagal Diupdate');
            }
        }
        return redirect()->to('/data_admin');
    }

    public function getAdmin()
    {
        $id_user = $this->request->getVar('id_user');
        $userData = $this->admin->find($id_user);
        return $this->response->setJSON($userData);
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $hapus = $this->admin->delete($id);
        if ($hapus) {
            $this->home->toast('success', 'Admin Berhasil Dihapus.');
        } else {
            $this->home->toast('error', 'Admin Gagal Dihapus.');
        }
        return redirect()->to('/data_admin');
    }
}
