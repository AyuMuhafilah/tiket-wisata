<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\WisataModel;
use App\Libraries\Pdf;

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
        $data['total'] = $getData['total_anggota'];
        $data['pengunjung'] = $getData['pengunjung'];
        return view('adminpage/laporan/pengunjung', $data);
    }

    public function pdfPengunjung()
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
        $data['total'] = $getData['total_anggota'];
        $data['pengunjung'] = $getData['pengunjung'];
        $data['nama_wisata'] = $data['admin']['nama_wisata'];
        $html = view('adminpage/laporan/lap_pengunjung', $data);

        $pdf->generate($html, $file_pdf, $paper, $orientation, true);
    }

    public function wisata()
    {
        $data = $this->home->getData();
        $data['wisata'] = $this->wisata->getJoinWisata();
        return view('adminpage/laporan/index_pengunjung', $data);
    }

    public function pengunjung($id)
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
        $wisata = $this->wisata->getJoinWisataId($id);
        $getData = $this->transaksi->getPengunjung($id, $mulai, $selesai);
        $data['id'] = $id;
        $data['nama_wisata'] = $wisata['nama_wisata'];
        $data['total'] = $getData['total_anggota'];
        $data['pengunjung'] = $getData['pengunjung'];
        // dd($data);
        return view('adminpage/laporan/pengunjung', $data);
    }

    public function pdfPengunjungWisata($id)
    {
        $wisata = $this->wisata->where('id_wisata', $id)->first();
        $pdf = new Pdf();
        $paper = 'A4';
        $orientation = "landscape";

        $tgl = $this->request->getPost('tgl');
        $tanggalArray = explode(' - ', $tgl);
        $mulai = $tanggalArray[0];
        $selesai = $tanggalArray[1];
        $getData = $this->transaksi->getPengunjung($id, $mulai, $selesai);

        $file_pdf = 'Laporan Pengunjung Wisata ' . $wisata['nama_wisata'];
        $data = [
            'mulai'        => $mulai,
            'selesai'      => $selesai,
            'total'        => $getData['total_anggota'],
            'pengunjung'   => $getData['pengunjung'],
            'nama_wisata'  => $wisata['nama_wisata']
        ];
        $html = view('adminpage/laporan/lap_pengunjung', $data);

        $pdf->generate($html, $file_pdf, $paper, $orientation, true);
    }

    public function allwisata()
    {
        $data = $this->home->getData();
        $data['wisata'] = $this->wisata->getJoinWisata();
        return view('adminpage/laporan/index_penjualan', $data);
    }
}
