<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            "title"     => "Dashboard",
            "menu"      => "dashboard",
            "submenu"   => "",
            "page"      => "v_admin"
        ];

        return view('v_template_admin', $data);
    }
}
