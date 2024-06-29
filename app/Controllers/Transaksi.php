<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\WisataModel;
use App\Libraries\Pdf;
use CodeIgniter\Email\Email;
// Setup PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        $terima = $this->transaksi->update($id, ['status' => 'Selesai']);
        if ($terima) {
            $this->home->toast('success', 'Validasi Pembayaran Berhasil Diproses');
        } else {
            $this->home->toast('error', 'Validasi Pembayaran Gagal Diproses.');
        }
        $this->eTiket($id);
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
        $this->emailTolak($id);
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
        $file_pdf = 'Laporan Penjualan';
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
        $data['nama_wisata'] = $data['admin']['nama_wisata'];
        $html = view('adminpage/laporan/lap_penjualan', $data);

        $pdf->generate($html, $file_pdf, $paper, $orientation, true);
    }

    public function penjualan($id)
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
        $data['transaksi'] = $getData['pengunjung'];
        $data['nama_wisata'] = $wisata['nama_wisata'];
        $data['total'] = $getData['total_penjualan'];
        $data['total_tiket'] = $getData['total_anggota'];
        return view('adminpage/laporan/penjualan', $data);
    }

    public function pdfPenjualanwisata($id)
    {
        $pdf = new Pdf();
        $paper = 'A4';
        $orientation = "landscape";

        $tgl = $this->request->getPost('tgl');
        $tanggalArray = explode(' - ', $tgl);
        $mulai = $tanggalArray[0];
        $selesai = $tanggalArray[1];
        $wisata = $this->wisata->where('id_wisata', $id)->first();
        $getData = $this->transaksi->getPengunjung($id, $mulai, $selesai);

        $file_pdf = 'Laporan Penjualan Wisata' . $wisata['nama_wisata'];
        $data = [
            'mulai'       => $mulai,
            'selesai'     => $selesai,
            'total_tiket' => $getData['total_anggota'],
            'total'       => $getData['total_penjualan'],
            'transaksi'   => $getData['pengunjung'],
            'nama_wisata' => $wisata['nama_wisata'],
        ];
        $html = view('adminpage/laporan/lap_penjualan', $data);

        $pdf->generate($html, $file_pdf, $paper, $orientation, true);
    }

    public function eTiket($id)
    {
        $pdf = new Pdf();
        $file_pdf = WRITEPATH . 'etiket/' . $id . '.pdf';
        $paper = 'A4';
        $orientation = 'portrait';
        $transaksi = $this->transaksi->getTransaksiById($id);
        $detail = $this->detail->getDetail($id);
        foreach ($detail as $val) {
            $transaksi[$val['jenis_tiket']] = $val['jumlah_tiket'];
            $transaksi['harga_' . $val['jenis_tiket']] = $val['harga'];
        }
        $data['transaksi'] = $transaksi;
        $html = view('homepage/e-tiket', $data);
        $pdf->generate($html, $file_pdf, $paper, $orientation, false);
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'ssl://smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '20220810026@uniku.ac.id';
            $mail->Password = 'rupzlihpnljoaeva';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 465;

            $mail->setFrom('20220810026@uniku.ac.id', 'Ayu Muhafilah');
            $mail->addAddress($transaksi['email']);
            $mail->addAttachment($file_pdf, $id . '.pdf');
            $mail->isHTML(true);
            $mail->Subject = 'E-Tiket Wisata';
            $mail->Body    = 'Berikut adalah e-tiket Anda.';
            $mail->send();
            $this->home->toast('success', 'E-Tiket Berhasil Dikirimkan Ke Email Pemesan');
        } catch (Exception $e) {
            $this->home->toast('success', 'E-Tiket Gagal Dikirimkan ' . $e);
        }
    }

    public function emailTolak($id)
    {
        $transaksi = $this->transaksi->getTransaksiById($id);
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'ssl://smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '20220810026@uniku.ac.id';
            $mail->Password = 'rupzlihpnljoaeva';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 465;

            $mail->setFrom('20220810026@uniku.ac.id', 'Ayu Muhafilah');
            $mail->addAddress($transaksi['email']);
            $mail->isHTML(true);
            $mail->Subject = 'E-Tiket Wisata';
            $mail->Body    = 'Mohon Maaf Transaksi Anda ditolak';
            $mail->send();
        } catch (Exception $e) {
            $this->home->toast('success', 'E-Tiket Gagal Dikirimkan');
        }
    }
}
