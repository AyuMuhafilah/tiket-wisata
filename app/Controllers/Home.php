<?php

namespace App\Controllers;

use App\Models\FasilitasModel;
use App\Models\HargaTiketModel;
use App\Models\WisataModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session   = session();
        $this->wisata    = new WisataModel();
        $this->fasilitas = new FasilitasModel();
        $this->harga     = new HargaTiketModel();
    }

    public function homepage()
    {

        $user = $this->session->get('user');
        $nama = '';
        if (isset($user)) {
            $nama = $this->getName();
        }
        $data = [
            'user'   => $user,
            'nama'   => $nama,
        ];
        $wisata = $this->wisata->getJoinWisata();
        $fasilitas = array_map(function ($wisata) {
            $result = $this->fasilitas->getFasilitasWisata($wisata['id_admin']);
            return $result ? $result : [];
        }, $wisata);

        // Ambil data harga untuk setiap wisata
        $harga = array_map(function ($wisata) {
            $result = $this->harga->getHargaTiket($wisata['id_wisata']);
            return $result ? $result : ['harga' => 0];
        }, $wisata);

        $data['wisata'] = array_map(function ($wisata, $fasilitas, $harga) {
            $wisata['fasilitas'] = $fasilitas;
            $wisata['harga'] = $harga['harga'];
            return $wisata;
        }, $wisata, $fasilitas, $harga);
        $data['wisata'] = array_filter($data['wisata'], function ($wisata) {
            return !empty($wisata['fasilitas']) && !empty($wisata['harga']);
        });
        return view('homepage/index', $data);
    }

    public function adminpage()
    {
        $data = $this->getData();
        return view('adminpage/index', $data);
    }

    public function getName()
    {
        $user = $this->session->get('user')['nama'];
        $parts = explode(' ', $user);
        $jml = count($parts);
        $firstName = $parts[0];
        if ($jml > 1) {
            $secondName = $parts[1];
            $nama = $firstName . ' ' . $secondName;
        } else {
            $nama = $firstName;
        }
        return $nama;
    }

    public function getData()
    {
        return [
            'user' => $this->session->get('user'),
            'admin' => $this->session->get('admin'),
            'nama' => $this->getName(),
            'errors' => $this->session->get('errors', []),
        ];
    }

    public function toast($icon, $title)
    {
        $this->session->setFlashdata('toast', [
            'icon' => $icon,
            'title' => 'Data ' . $title . '.'
        ]);
    }
}
