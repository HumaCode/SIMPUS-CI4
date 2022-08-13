<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }


    public function index()
    {
        $data = [
            "title" => "Login",
            "page" => "v_login"
        ];

        return view('v_template_login', $data);
    }

    public function loginUser()
    {
        $data = [
            "title" => "Login Admin",
            "page" => "v_login_user"
        ];

        return view('v_template_login', $data);
    }

    public function cekLoginUser()
    {
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                    'valid_email' => '{field} tidak valid.!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                ]
            ],
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $cek_login = $this->ModelAuth->loginUser($email, $password);
            if ($cek_login) {
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('email', $cek_login['email']);
                session()->set('level', $cek_login['level']);

                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('pesan', 'Email atau password salah.!!');

                return redirect()->to(base_url('auth/loginUser'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('auth/loginUser'));
        }
    }

    public function loginAnggota()
    {
        $data = [
            "title" => "Login Anggota",
            "page" => "v_login_anggota"
        ];

        return view('v_template_login', $data);
    }

    public function logout()

    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');

        session()->setFlashdata('pesan', 'Berhasil logout.!!');

        return redirect()->to(base_url('auth'));
    }
}
