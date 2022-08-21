<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengaturan;

class Pengaturan extends BaseController
{
    public function __construct()
    {
        $this->ModelPengaturan = new ModelPengaturan();
    }

    public function web()
    {
        $data = [
            "title"     => "Pengaturan Web",
            "menu"      => "pengaturan",
            "submenu"   => "pengaturan",
            "web"       => $this->ModelPengaturan->getDataById(),
            "page"      => "v_pengaturan_web"
        ];

        return view('v_template_admin', $data);
    }
}
