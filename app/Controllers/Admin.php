<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "page" => "v_admin"
        ];

        return view('v_template_admin', $data);
    }
}
