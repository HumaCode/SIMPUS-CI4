<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Home",
            "page" => "v_home"
        ];

        return view('v_template', $data);
    }
}
