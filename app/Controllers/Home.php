<?php

namespace App\Controllers;

use App\Models\ModelPengaturan;

class Home extends BaseController
{

    public function __construct()
    {
        $this->ModelPengaturan = new ModelPengaturan();
    }

    public function index()
    {
        $data = [
            "title"     => "Home",
            "slider"    => $this->ModelPengaturan->slider(),
            "page"      => "v_home"
        ];

        return view('v_template', $data);
    }
}
