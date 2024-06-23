<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\WisataModel;
use CodeIgniter\HTTP\ResponseInterface;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->session   = session();
        $this->home      = new Home();
        $this->wisata    = new WisataModel();
        $this->transaksi = new TransaksiModel();
        $this->detail    = new DetailTransaksiModel();
    }
    public function index()
    {
        $data = $this->home->getData();
        $data['transaksi'] = $this->transaksi->getTransaksi($data['admin']['id_wisata']);
        return view('adminpage/transaksi/validasi', $data);
    }

    public function status()
    {
        $data = $this->home->getData();
        $data['transaksi'] = $this->transaksi->getTransaksi($data['admin']['id_wisata'], false);
        return view('adminpage/transaksi/status', $data);
    }

    public function terima()
    {
        $id = $this->request->getPost('id');
        $tolak = $this->transaksi->update($id, ['status' => 'Selesai']);
        if ($tolak) {
            $this->home->toast('success', 'Validasi Pembayaran Berhasil Diproses');
        } else {
            $this->home->toast('error', 'Validasi Pembayaran Gagal Diproses.');
        }
        return redirect()->to('transaksi');
    }

    public function tolak()
    {
        $id = $this->request->getPost('id');
        $tolak = $this->transaksi->update($id, ['status' => 'Ditolak']);
        if ($tolak) {
            $this->home->toast('success', 'Validasi Pembayaran Berhasil Diproses');
        } else {
            $this->home->toast('error', 'Validasi Pembayaran Gagal Diproses.');
        }
        return redirect()->to('transaksi');
    }

    public function detail($id)
    {
        $transaksi = $this->transaksi->getTransaksiById($id);
        $detail = $this->detail->getDetail($id);
        $data = [
            'transaksi' => $transaksi,
            'detail' => $detail,
        ];
        return $this->response->setJSON($data);
    }
}
