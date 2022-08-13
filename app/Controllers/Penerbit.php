<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenerbit;

class Penerbit extends BaseController
{
    public function __construct()
    {
        $this->ModelPenerbit = new ModelPenerbit();
    }


    public function index()
    {
        $data = [
            "title"     => "Penerbit",
            "menu"      => "masterdata",
            "submenu"   => "penerbit",
            "penerbit"  => $this->ModelPenerbit->getAllData(),
            "page"      => "v_penerbit"
        ];

        return view('v_template_admin', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_penerbit' => htmlspecialchars($this->request->getPost('penerbit'))
        ];

        $this->ModelPenerbit->tambah($data);

        session()->setFlashdata('pesan', 'Berhasil menambah data');
        return redirect()->to(base_url('penerbit'));
    }

    public function edit($id_penerbit)
    {
        $data = [
            'nama_penerbit' => htmlspecialchars($this->request->getPost('penerbit'))
        ];

        $this->ModelPenerbit->edit($id_penerbit, $data);

        session()->setFlashdata('pesan', 'Berhasil mengedit data');
        return redirect()->to(base_url('penerbit'));
    }

    public function hapus($id_penerbit)
    {

        $this->ModelPenerbit->hapus($id_penerbit);

        session()->setFlashdata('pesan', 'Berhasil dihapus');
        return redirect()->to(base_url('penerbit'));
    }
}
