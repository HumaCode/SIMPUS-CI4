<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelKelas;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelKelas = new ModelKelas();
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

    public function register()
    {
        $data = [
            "title" => "Register Anggota",
            "page"  => "v_register_anggota",
            "kelas" => $this->ModelKelas->getAllData(),
        ];

        return view('v_template_login', $data);
    }

    public function prosesRegister()
    {
        if ($this->validate([
            'nis' => [
                'label' => 'NIS',
                'rules' => 'required|is_unique[tbl_anggota.nis]',
                'errors' => [
                    'required'  => '{field} tidak boleh kosong.!!',
                    'is_unique' => '{field} sudah terdaftar.!!',
                ]
            ],
            'nama' => [
                'label' => 'Nama Siswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                ]
            ],
            'jk' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih.!!',
                ]
            ],
            'kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih.!!',
                ]
            ],
            'no_hp' => [
                'label' => 'No. Handphone',
                'rules' => 'required|is_unique[tbl_anggota.no_hp]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                    'is_unique' => '{field} sudah terdaftar.!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                ]
            ],
            'password2' => [
                'label' => 'Repeat Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
                    'matches' => '{field} tidak sama.!!',
                ]
            ],

        ])) {

            $data = [
                'nis'           => htmlspecialchars($this->request->getPost('nis')),
                'nama_siswa'    => htmlspecialchars($this->request->getPost('nama')),
                'jenis_kelamin' => htmlspecialchars($this->request->getPost('jk')),
                'no_hp'         => htmlspecialchars($this->request->getPost('no_hp')),
                'password'      => htmlspecialchars($this->request->getPost('password')),
                'id_kelas'      => htmlspecialchars($this->request->getPost('kelas')),
            ];

            $this->ModelAuth->register($data);

            session()->setFlashdata('pesan', 'Akun berhasil dibuat');
            return redirect()->to(base_url('auth/loginAnggota'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('auth/register'))->withInput('validation',  \Config\Services::validation());
        }
    }
}
