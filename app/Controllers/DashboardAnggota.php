<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardAnggota extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "page"  => "v_dashboard_anggota"
        ];

        return view('v_template_anggota', $data);
    }
}
