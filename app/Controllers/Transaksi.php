<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\WisataModel;
use App\Libraries\Pdf;

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

    public function laporan()
    {
        $data = $this->home->getData();
        $tgl = $this->request->getPost('tanggal');
        if (isset($tgl)) {
            $tanggalArray = explode(' - ', $tgl);
            $mulai = $tanggalArray[0];
            $selesai = $tanggalArray[1];
            $data['tgl'] = $tgl;
        } else {
            $mulai = date('Y-m-d');
            $selesai = date('Y-m-d');
            $data['tgl'] = $mulai . ' - ' . $selesai;
        }
        $getData = $this->transaksi->getPengunjung($data['admin']['id_wisata'], $mulai, $selesai);
        $data['total_tiket'] = $getData['total_anggota'];
        $data['total'] = $getData['total_penjualan'];
        $data['transaksi'] = $getData['pengunjung'];
        return view('adminpage/laporan/penjualan', $data);
    }

    public function pdfPenjualan()
    {
        $pdf = new Pdf();
        $file_pdf = 'Laporan Pengunjung';
        $paper = 'A4';
        $orientation = "landscape";

        $data = $this->home->getData();
        $tgl = $this->request->getPost('tgl');
        $tanggalArray = explode(' - ', $tgl);
        $mulai = $tanggalArray[0];
        $selesai = $tanggalArray[1];
        $getData = $this->transaksi->getPengunjung($data['admin']['id_wisata'], $mulai, $selesai);

        $data['mulai'] = $mulai;
        $data['selesai'] = $selesai;
        $data['total_tiket'] = $getData['total_anggota'];
        $data['total'] = $getData['total_penjualan'];
        $data['transaksi'] = $getData['pengunjung'];
        $html = view('adminpage/laporan/lap_penjualan', $data);

        $pdf->generate($html, $file_pdf, $paper, $orientation, true);
    }
}
