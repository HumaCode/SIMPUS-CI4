<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenulis;

class Penulis extends BaseController
{
    public function __construct()
    {
        $this->ModelPenulis = new ModelPenulis();
    }


    public function index()
    {
        $data = [
            "title"     => "Penulis",
            "menu"      => "masterdata",
            "submenu"   => "penulis",
            "penulis"   => $this->ModelPenulis->getAllData(),
            "page"      => "v_penulis"
        ];

        return view('v_template_admin', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_penulis' => htmlspecialchars($this->request->getPost('penulis'))
        ];

        $this->ModelPenulis->tambah($data);

        session()->setFlashdata('pesan', 'Berhasil menambah data');
        return redirect()->to(base_url('penulis'));
    }

    public function edit($id_penulis)
    {
        $data = [
            'nama_penulis' => htmlspecialchars($this->request->getPost('penulis'))
        ];

        $this->ModelPenulis->edit($id_penulis, $data);

        session()->setFlashdata('pesan', 'Berhasil mengedit data');
        return redirect()->to(base_url('penulis'));
    }

    public function hapus($id_penulis)
    {

        $this->ModelPenulis->hapus($id_penulis);

        session()->setFlashdata('pesan', 'Berhasil dihapus');
        return redirect()->to(base_url('penulis'));
    }
}
