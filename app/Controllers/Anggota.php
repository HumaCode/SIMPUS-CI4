<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Anggota extends BaseController
{
    public function __construct()
    {
        $this->ModelAnggota = new ModelAnggota();
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
}
