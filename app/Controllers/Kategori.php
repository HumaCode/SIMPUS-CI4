<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }


    public function index()
    {
        $data = [
            "title"     => "Kategori",
            "kategori"  => $this->ModelKategori->getAllData(),
            "page"      => "v_kategori"
        ];

        return view('v_template_admin', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_kategori' => htmlspecialchars($this->request->getPost('kategori'))
        ];

        $this->ModelKategori->tambah($data);

        session()->setFlashdata('pesan', 'Berhasil menambah data');
        return redirect()->to(base_url('kategori'));
    }
}