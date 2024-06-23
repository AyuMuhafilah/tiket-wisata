<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\WisataModel;
use CodeIgniter\HTTP\ResponseInterface;

class Wisatawan extends BaseController
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
        $tgl = $this->request->getPost('tanggal');
        $data['pengunjung'] = [];
        if (isset($tgl)) {
            $tanggalArray = explode(' - ', $tgl);
            $mulai = date('Y-m-d', strtotime($tanggalArray[0]));
            $selesai = date('Y-m-d', strtotime($tanggalArray[1]));
        } else {
            $mulai = date('Y-m-d');
            $selesai = date('Y-m-d');
        }
        $data['tgl'] = $tgl;
        $data['pengunjung'] = $this->transaksi->getPengunjung($data['admin']['id_wisata'], $mulai, $selesai);
        return view('adminpage/wisatawan/index', $data);
    }
}
