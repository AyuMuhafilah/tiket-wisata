<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BankModel;
use CodeIgniter\HTTP\ResponseInterface;

class Bank extends BaseController
{
    public function __construct()
    {
        $this->home = new Home();
        $this->bank = new BankModel();
    }
    public function index()
    {
        $data = $this->home->getData();
        $data['bank'] = $this->bank->where('id_admin', $data['user']['id_user'])->findAll();
        return view('adminpage/bank/index', $data);
    }

    public function store()
    {
        $getData = $this->home->getData();
        $id_admin = $getData['user']['id_user'];
        $data = [
            'id_admin'  => $id_admin,
            'nama_bank' => $this->request->getPost('nama_bank'),
            'no_rek'    => $this->request->getPost('no_rek'),
        ];
        if (!$this->bank->validate($data)) {
            session()->setFlashdata('toast', [
                'icon' => 'error',
                'title' => implode(', ', $this->bank->errors())
            ]);
            return redirect()->to('bank');
        }
        $simpan = $this->bank->insert($data);
        if ($simpan) {
            $this->home->toast('success', 'Bank Berhasil Ditambahkan.');
        } else {
            $this->home->toast('error', 'Bank Gagal Ditambahkan.');
        }
        return redirect()->to('bank');
    }

    public function update()
    {
        $id = $this->request->getPost('id_bank');
        $data = [
            'nama_bank' => $this->request->getPost('nama_bank'),
            'no_rek'    => $this->request->getPost('no_rek'),
        ];

        $this->bank->setValidationRules($id);
        if (!$this->bank->validate($data)) {
            $this->home->toast('error', implode(', ', $this->bank->errors()));
            return redirect()->to('bank');
        }
        $update = $this->bank->update($id, $data);
        if ($update) {
            $this->home->toast('success', 'Bank Berhasil Diupdate.');
        } else {
            $this->home->toast('error', 'Bank Gagal Diupdate.');
        }
        return redirect()->to('bank');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $hapus = $this->bank->delete($id);
        if ($hapus) {
            $this->home->toast('success', 'Bank Berhasil Dihapus.');
        } else {
            $this->home->toast('error', 'Bank Gagal Dihapus.');
        }
        return redirect()->to('bank');
    }
}
