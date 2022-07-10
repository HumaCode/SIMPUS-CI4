<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRak;

class Rak extends BaseController
{
    public function __construct()
    {
        $this->ModelRak = new ModelRak();
    }


    public function index()
    {
        $data = [
            "title"     => "Rak",
            "rak"       => $this->ModelRak->getAllData(),
            "page"      => "v_rak"
        ];

        return view('v_template_admin', $data);
    }

    public function tambah()
    {
        $data = [
            'nama_rak' => htmlspecialchars($this->request->getPost('rak')),
            'lantai_rak' => htmlspecialchars($this->request->getPost('lantai_rak'))
        ];

        $this->ModelRak->tambah($data);

        session()->setFlashdata('pesan', 'Berhasil menambah data');
        return redirect()->to(base_url('rak'));
    }

    public function edit($id_rak)
    {
        $data = [
            'nama_rak' => htmlspecialchars($this->request->getPost('rak')),
            'lantai_rak' => htmlspecialchars($this->request->getPost('lantai_rak'))
        ];

        $this->ModelRak->edit($id_rak, $data);

        session()->setFlashdata('pesan', 'Berhasil mengedit data');
        return redirect()->to(base_url('rak'));
    }

    public function hapus($id_rak)
    {

        $this->ModelRak->hapus($id_rak);

        session()->setFlashdata('pesan', 'Berhasil dihapus');
        return redirect()->to(base_url('rak'));
    }
}
