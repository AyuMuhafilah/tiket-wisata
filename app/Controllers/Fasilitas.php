<?php

namespace App\Controllers;

use App\Models\FasilitasModel;
use App\Controllers\BaseController;

class Fasilitas extends BaseController
{

    public function __construct()
    {
        $this->home = new Home();
        $this->fasilitas = new FasilitasModel();
    }
    public function index()
    {
        $data = $this->home->getData();
        $data['fasilitas'] = $this->fasilitas->where('id_admin', $data['user']['id_user'])->findAll();
        return view('adminpage/fasilitas/index', $data);
    }
    public function store()
    {
        $getData = $this->home->getData();
        $id_admin = $getData['user']['id_user'];
        $data = [
            'id_admin'       => $id_admin,
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
        ];
        if (!$this->fasilitas->validate($data)) {
            session()->setFlashdata('toast', [
                'icon' => 'error',
                'title' => implode(', ', $this->fasilitas->errors())
            ]);
            return redirect()->to('/fasilitas');
        }
        $simpan = $this->fasilitas->insert($data);
        if ($simpan) {
            $this->home->toast('success', 'Fasilitas Berhasil Ditambahkan.');
        } else {
            $this->home->toast('error', 'Fasilitas Gagal Ditambahkan.');
        }
        return redirect()->to('/fasilitas');
    }

    public function update()
    {
        $id = $this->request->getPost('id_fasilitas');
        $data = [
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
        ];

        if (!$this->fasilitas->validate($data)) {
            $this->home->toast('error', implode(', ', $this->fasilitas->errors()));
            return redirect()->to('/fasilitas');
        }
        $update = $this->fasilitas->update($id, $data);
        if ($update) {
            $this->home->toast('success', 'Fasilitas Berhasil Diupdate.');
        } else {
            $this->home->toast('error', 'Fasilitas Gagal Diupdate.');
        }
        return redirect()->to('/fasilitas');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $hapus = $this->fasilitas->delete($id);
        if ($hapus) {
            $this->home->toast('success', 'Fasilitas Berhasil Dihapus.');
        } else {
            $this->home->toast('error', 'Fasilitas Gagal Dihapus.');
        }
        return redirect()->to('/fasilitas');
    }
}
