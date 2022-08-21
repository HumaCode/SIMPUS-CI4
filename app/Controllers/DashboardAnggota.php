<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class DashboardAnggota extends BaseController
{

    public function __construct()
    {
        $this->ModelAnggota = new ModelAnggota();
    }

    public function index()
    {
        // id anggota dari session login
        $id_anggota = session()->get('id_anggota');

        $data = [
            "title"     => "Profile Anggota",
            "menu"      => "profil",
            "sub_menu"  => '',
            "profil"    => $this->ModelAnggota->profileAnggota($id_anggota),
            "page"      => "v_dashboard_anggota"
        ];

        return view('v_template_anggota', $data);
    }
}
