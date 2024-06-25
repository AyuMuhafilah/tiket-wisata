<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BankModel;
use App\Models\DetailTransaksiModel;
use App\Models\FasilitasModel;
use App\Models\HargaTiketModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\WisataModel;

class Wisata extends BaseController
{
    public function __construct()
    {
        $this->session   = session();
        $this->home      = new Home();
        $this->bank      = new BankModel();
        $this->admin     = new UserModel();
        $this->wisata    = new WisataModel();
        $this->fasilitas = new FasilitasModel();
        $this->transaksi = new TransaksiModel();
        $this->harga     = new HargaTiketModel();
        $this->detail    = new DetailTransaksiModel();
    }

    public function index()
    {
        $data = $this->home->getData();
        $wisata = $this->wisata->getJoinWisata();
        $fasilitas = array_map(function ($wisata) {
            return $this->fasilitas->getFasilitasWisata($wisata['id_admin']);
        }, $wisata);
        $data['wisata'] = array_map(function ($wisata, $fasilitas) {
            $wisata['fasilitas'] = $fasilitas;
            return $wisata;
        }, $wisata, $fasilitas);
        return view('adminpage/wisata/index', $data);
    }
    public function create()
    {
        $data = $this->home->getData();
        $data['admin']     = $this->admin->getAdmin();
        return view('adminpage/wisata/create', $data);
    }

    public function store()
    {
        $fileGambar = $this->request->getFile('gambar');
        $data = [
            'id_admin'    => $this->request->getPost('id_admin'),
            'nama_wisata' => $this->request->getPost('nama_wisata'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
        ];
        if (!$this->wisata->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $this->wisata->errors());
        }
        if ($fileGambar->isValid()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img/wisata', $namaGambar);
            $data['gambar'] = $namaGambar;
        }
        $simpan = $this->wisata->insert($data);
        if ($simpan) {
            $this->home->toast('success', 'Wisata Berhasil Disimpan');
        } else {
            $this->home->toast('error', 'Wisata Gagal Disimpan');
        }

        return redirect()->to('/wisata');
    }

    public function edit($id)
    {
        $data = $this->home->getData();
        $data['val']    = $this->wisata->find($id);
        $data['admin']     = $this->admin->where('role', 'admin')->findAll();
        return view('adminpage/wisata/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_wisata');
        $fileGambar = $this->request->getFile('gambar');
        $data = [
            'id_admin'    => $this->request->getPost('id_admin'),
            'nama_wisata' => $this->request->getPost('nama_wisata'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
        ];
        $wisata = $this->wisata->find($id);
        if (!$wisata) {
            $this->home->toast('error', 'Wisata Wisata Tidak Ditemukan');
            return redirect()->back()->with('error', 'Wisata tidak ditemukan');
        }
        if ($fileGambar->isValid()) {
            if ($wisata['gambar'] && file_exists('img/wisata/' . $wisata['gambar'])) {
                unlink('img/wisata/' . $wisata['gambar']);
            }
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img/wisata', $namaGambar);
            $data['gambar'] = $namaGambar;
        }
        $updated = $this->wisata->update($id, $data);
        if ($updated) {
            $this->home->toast('success', 'Wisata Berhasil Diupdate');
        } else {
            $this->home->toast('error', 'Wisata Gagal Diupdate');
        }
        return redirect()->to('/wisata');
    }


    public function delete()
    {
        $id = $this->request->getPost('id');
        $hapus = $this->wisata->delete($id);
        if ($hapus) {
            $this->home->toast('success', 'Wisata Berhasil Dihapus.');
        } else {
            $this->home->toast('error', 'Wisata Gagal Dihapus.');
        }
        return redirect()->to('/wisata');
    }

    public function getWisataById($id)
    {
        $wisata = $this->wisata->find($id);
        $harga = $this->harga->getHargaAll($id);

        $hargaWisata = [];
        foreach ($harga as $hargaItem) {
            $hargaWisata['id' . $hargaItem['jenis_tiket']] = $hargaItem['id_harga'];
            $hargaWisata[$hargaItem['jenis_tiket']] = $hargaItem['harga'];
        }
        $wisata['harga'] = $hargaWisata;
        return $this->response->setJSON($wisata);
    }

    public function pesan()
    {
        $id_wisatawan  = $this->request->getPost('id_wisatawan');
        $id_transaksi  = $this->buatIdTransaksi($id_wisatawan);
        $id_wisata     = $this->request->getPost('id_wisata');
        $tgl_transaksi = date('Y-m-d');
        $total_bayar   = preg_replace('/\D/', '', $this->request->getPost('total_bayar'));
        $jml_dewasa    = $this->request->getPost('jml_dewasa');
        $jml_anak      = $this->request->getPost('jml_anak');
        $total_tiket   = $jml_dewasa + $jml_anak;

        $data = [
            'id_transaksi'  => $id_transaksi,
            'id_wisatawan'  => $id_wisatawan,
            'id_wisata'     => $id_wisata,
            'tgl_transaksi' => $tgl_transaksi,
            'total_bayar'   => $total_bayar,
            'total_tiket'   => $total_tiket,

        ];
        $fileGambar = $this->request->getFile('bukti_bayar');
        if ($fileGambar->isValid()) {
            $namaGambar = $id_transaksi . '.' . $fileGambar->getExtension();
            $fileGambar->move('img/bukti', $namaGambar);
            $data['bukti_bayar'] = $namaGambar;
        }
        $simpan_transaksi = $this->transaksi->insert($data);

        $detail = [];
        $data1 = [
            'id_transaksi'     => $id_transaksi,
            'id_harga'         => $this->request->getPost('id_dewasa'),
            'jumlah_tiket'     => $this->request->getPost('jml_dewasa')
        ];
        $detail[] = $data1;
        if (isset($jml_anak)) {
            $data2 = [
                'id_transaksi'   => $id_transaksi,
                'id_harga'       => $this->request->getPost('id_anak'),
                'jumlah_tiket'   => $jml_anak
            ];
            $detail[] = $data2;
        }
        $simpan_detail = $this->detail->insertBatch($detail);
        if ($simpan_transaksi && $simpan_detail) {
            $this->home->toast('success', 'Transaksi Sedang Diproses');
        } else {
            $this->home->toast('error', 'Transaksi Gagal Diproses');
        }

        return redirect()->to('history/' . $data['id_wisatawan']);
    }

    function buatIdTransaksi($userId, $prefix = 'TRX')
    {
        // Mengambil waktu saat ini dalam milidetik
        $timestamp = round(microtime(true) * 1000);
        // Menyusun ID transaksi
        $idTransaksi = $prefix . $timestamp . $userId;
        return $idTransaksi;
    }

    public function getDetailWisataById($id)
    {
        $wisata = [];
        $wisata = $this->wisata->getJoinWisataId($id);
        $fasilitas = $this->fasilitas->getFasilitasWisata($wisata['id_admin']);
        $harga = $this->harga->getHargaAll($wisata['id_wisata']);
        $bank = $this->bank->where('id_admin', $wisata['id_admin'])->findAll();
        $wisata['fasilitas'] = $fasilitas;
        $wisata['harga'] = $harga;
        $wisata['bank'] = $bank;
        return $this->response->setJSON($wisata);
    }
}
