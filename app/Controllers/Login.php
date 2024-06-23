<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\WisataModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->wisata = new WisataModel();
    }

    public function index()
    {
        $data = [
            'success' => session()->getFlashdata('success') ?: '',
            'errors' => session()->getFlashdata('errors') ?: ''
        ];
        return view('login/login', $data);
    }

    public function login()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUser($username);
        if ($user) {
            $admin = $this->wisata->getAdminWisata($user['id_user']);
            if (password_verify($password, $user['password'])) {
                $this->session->set('user', $user);
                $this->session->set('admin', $admin);
                $this->session->setFlashdata('toast', [
                    'icon' => 'success',
                    'title' => ' Login Berhasil'
                ]);
                if ($user['role'] != 'wisatawan') {
                    return redirect()->to('dashboard');
                } else {
                    return redirect()->to('/');
                }
            } else {
                $this->session->setFlashdata('toast', [
                    'icon' => 'error',
                    'title' => ' Password Tidak Sesuai'
                ]);
                return redirect()->to('login');
            }
        } else {
            $this->session->setFlashdata('toast', [
                'icon' => 'error',
                'title' => ' Username Tidak Ditemukan'
            ]);
            return redirect()->to('login');
        }
    }

    public function register()
    {
        $data = [
            'errors' => session()->getFlashdata('errors') ?: [],
        ];
        return view('login/register', $data);
    }
    public function register_store()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama'     => $this->request->getPost('nama'),
            'no_hp'    => $this->request->getPost('no_hp'),
            'email'    => $this->request->getPost('email'),
        ];
        if (!$userModel->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $userModel->errors());
        }
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $register = $userModel->save($data);
        if ($register) {
            $user = $userModel->getUser($data['username']);
            $this->session->set('user', $user);
            $this->session->setFlashdata('toast', [
                'icon' => 'succes',
                'title' => ' Register Berhasil'
            ]);
            return redirect()->to(base_url('/'));
        } else {
            $this->session->setFlashdata('toast', [
                'icon' => 'error',
                'title' => ' Register Gagal, Silahkan Coba Kembali'
            ]);
            return redirect()->to('register');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
