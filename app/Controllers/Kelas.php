<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKelas;

class Kelas extends BaseController
{
    public function __construct()
    {
        $this->ModelKelas = new ModelKelas();
    }


    public function index()
    {
        $data = [
            "title"     => "Kelas",
            "menu"      => "masteranggota",
            "submenu"   => "kelas",
            "kelas"     => $this->ModelKelas->getAllData(),
            "page"      => "v_kelas"
        ];

        return view('v_template_admin', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_kelas' => htmlspecialchars($this->request->getPost('kelas'))
        ];

        $this->ModelKelas->tambah($data);

        session()->setFlashdata('pesan', 'Berhasil menambah data');
        return redirect()->to(base_url('kelas'));
    }

    public function edit($id_kelas)
    {
        $data = [
            'nama_kelas' => htmlspecialchars($this->request->getPost('kelas')),
        ];

        $this->ModelKelas->edit($id_kelas, $data);

        session()->setFlashdata('pesan', 'Berhasil mengedit data');
        return redirect()->to(base_url('kelas'));
    }

    public function hapus($id_kelas)
    {

        $this->ModelKelas->hapus($id_kelas);

        session()->setFlashdata('pesan', 'Berhasil dihapus');
        return redirect()->to(base_url('kelas'));
    }
}
