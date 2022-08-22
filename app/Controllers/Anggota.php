<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;
use App\Models\ModelKelas;

class Anggota extends BaseController
{
    public function __construct()
    {
        $this->ModelAnggota = new ModelAnggota();
        $this->ModelKelas   = new ModelKelas();
    }

    public function index()
    {
        $data = [
            "title"     => "Anggota",
            "menu"      => "masteranggota",
            "submenu"   => "anggota",
            "anggota"   => $this->ModelAnggota->getAllData(),
            "page"      => "anggota/v_index"
        ];

        return view('v_template_admin', $data);
    }

    public function verifikasi($id_anggota)
    {
        $data = [
            'verifikasi' => 1,
        ];

        $this->ModelAnggota->edit($id_anggota, $data);

        session()->setFlashdata('pesan', 'Berhasil diverifikasi');
        return redirect()->to(base_url('anggota'));
    }

    public function add()
    {
        $data = [
            "title"     => "Tambah Data",
            "menu"      => "masteranggota",
            "submenu"   => "anggota",
            "kelas"     => $this->ModelKelas->getAllData(),
            "page"      => "anggota/v_add_data"
        ];

        return view('v_template_admin', $data);
    }

    public function addData()
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
            'alamat' => [
                'label' => 'Alamat',
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


        ])) {

            $fileFoto = $this->request->getFile('file');

            if ($fileFoto == '') {
                $data = [
                    'nis'           => htmlspecialchars($this->request->getPost('nis')),
                    'nama_siswa'    => htmlspecialchars($this->request->getPost('nama')),
                    'alamat'        => htmlspecialchars($this->request->getPost('alamat')),
                    'jenis_kelamin' => htmlspecialchars($this->request->getPost('jk')),
                    'no_hp'         => htmlspecialchars($this->request->getPost('no_hp')),
                    'password'      => htmlspecialchars($this->request->getPost('password')),
                    'id_kelas'      => htmlspecialchars($this->request->getPost('kelas')),
                    'verifikasi'    => '0',
                ];
            } else {

                $foto = $fileFoto->getRandomName();

                $data = [
                    'nis'           => htmlspecialchars($this->request->getPost('nis')),
                    'nama_siswa'    => htmlspecialchars($this->request->getPost('nama')),
                    'alamat'        => htmlspecialchars($this->request->getPost('alamat')),
                    'jenis_kelamin' => htmlspecialchars($this->request->getPost('jk')),
                    'no_hp'         => htmlspecialchars($this->request->getPost('no_hp')),
                    'foto'          => $foto,
                    'password'      => htmlspecialchars($this->request->getPost('password')),
                    'id_kelas'      => htmlspecialchars($this->request->getPost('kelas')),
                    'verifikasi'    => '0',
                ];

                $fileFoto->move('img/user', $foto);
            }

            $this->ModelAnggota->tambah($data);

            session()->setFlashdata('pesan', 'Data berhasil ditambah');
            return redirect()->to(base_url('anggota'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('anggota/add'))->withInput('validation',  \Config\Services::validation());
        }
    }

    public function edit($id_anggota)
    {
        $data = [
            "title"     => "Edit Data",
            "menu"      => "masteranggota",
            "submenu"   => "anggota",
            "kelas"     => $this->ModelKelas->getAllData(),
            "anggota"   => $this->ModelAnggota->profileAnggota($id_anggota),
            "page"      => "anggota/v_edit_data"
        ];

        return view('v_template_admin', $data);
    }

    public function editData()
    {
        if ($this->validate([
            'nis' => [
                'label' => 'NIS',
                'rules' => 'required',
                'errors' => [
                    'required'  => '{field} tidak boleh kosong.!!',
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
            'alamat' => [
                'label' => 'Alamat',
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
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.!!',
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

            $fileFoto   = $this->request->getFile('file');
            $id_anggota = $this->request->getPost('id_anggota');

            if ($fileFoto == '') {
                $data = [
                    'nis'           => htmlspecialchars($this->request->getPost('nis')),
                    'nama_siswa'    => htmlspecialchars($this->request->getPost('nama')),
                    'alamat'        => htmlspecialchars($this->request->getPost('alamat')),
                    'jenis_kelamin' => htmlspecialchars($this->request->getPost('jk')),
                    'no_hp'         => htmlspecialchars($this->request->getPost('no_hp')),
                    'password'      => htmlspecialchars($this->request->getPost('password')),
                    'id_kelas'      => htmlspecialchars($this->request->getPost('kelas')),
                    'verifikasi'    => '0',
                ];
            } else {

                $foto = $fileFoto->getRandomName();

                $anggota = $this->ModelAnggota->profileAnggota($id_anggota);

                // unlink
                $fotolama = $anggota['foto'];
                if ($fotolama != '') {
                    unlink('img/user/' . $fotolama);
                }

                $data = [
                    'nis'           => htmlspecialchars($this->request->getPost('nis')),
                    'nama_siswa'    => htmlspecialchars($this->request->getPost('nama')),
                    'alamat'        => htmlspecialchars($this->request->getPost('alamat')),
                    'jenis_kelamin' => htmlspecialchars($this->request->getPost('jk')),
                    'no_hp'         => htmlspecialchars($this->request->getPost('no_hp')),
                    'foto'          => $foto,
                    'password'      => htmlspecialchars($this->request->getPost('password')),
                    'id_kelas'      => htmlspecialchars($this->request->getPost('kelas')),
                    'verifikasi'    => '0',
                ];

                $fileFoto->move('img/user', $foto);
            }

            $this->ModelAnggota->edit($id_anggota, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('anggota'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('anggota/edit'))->withInput('validation',  \Config\Services::validation());
        }
    }
}
