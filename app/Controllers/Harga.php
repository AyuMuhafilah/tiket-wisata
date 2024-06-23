<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HargaTiketModel;
use App\Models\WisataModel;
use CodeIgniter\HTTP\ResponseInterface;

class Harga extends BaseController
{
    public function __construct()
    {
        $this->home = new Home();
        $this->wisata = new WisataModel();
        $this->harga = new HargaTiketModel();
    }
    public function index()
    {
        $data = $this->home->getData();
        $data['harga'] = $this->harga->where('id_wisata', $data['admin']['id_wisata'])->findAll();
        return view('adminpage/harga/index', $data);
    }

    public function store()
    {
        $getData = $this->home->getData();
        $id_admin = $getData['user']['id_user'];
        $tiket = $this->wisata->where('id_admin', $id_admin)->first();
        $data = [
            'id_wisata'       => $tiket['id_wisata'],
            'jenis_tiket'     => $this->request->getPost('jenis_tiket'),
            'harga'           => $this->request->getPost('harga'),
            'tgl_mulai'       => $this->request->getPost('tanggal_mulai'),
            'tgl_selesai'     => $this->request->getPost('tanggal_selesai'),
        ];
        // if (!$this->fasilitas->validate($data)) {
        //     session()->setFlashdata('toast', [
        //         'icon' => 'error',
        //         'title' => implode(', ', $this->fasilitas->errors())
        //     ]);
        //     return redirect()->to('/fasilitas');
        // }
        $simpan = $this->harga->insert($data);
        if ($simpan) {
            $this->home->toast('success', 'Harga Tiket Berhasil Ditambahkan.');
        } else {
            $this->home->toast('error', 'Harga Tiket Gagal Ditambahkan.');
        }
        return redirect()->to('/harga');
    }

    public function update()
    {
        $id = $this->request->getPost('id_harga');
        $data = [
            'id_wisata'       => $this->request->getPost('id_wisata'),
            'jenis_tiket'     => $this->request->getPost('jenis_tiket'),
            'harga'           => $this->request->getPost('harga'),
            'tgl_mulai'       => $this->request->getPost('tanggal_mulai'),
            'tgl_selesai'     => $this->request->getPost('tanggal_selesai'),
        ];
        // dd($data, $id);
        $update = $this->harga->update($id, $data);
        if ($update) {
            $this->home->toast('success', 'Harga Tiket Berhasil Diupdate.');
        } else {
            $this->home->toast('error', 'Harga Tiket Gagal Diupdate.');
        }
        return redirect()->to('/harga');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $hapus = $this->harga->delete($id);
        if ($hapus) {
            $this->home->toast('success', 'Harga Tiket Berhasil Dihapus.');
        } else {
            $this->home->toast('error', 'Harga Tiket Gagal Dihapus.');
        }
        return redirect()->to('/harga');
    }
}
