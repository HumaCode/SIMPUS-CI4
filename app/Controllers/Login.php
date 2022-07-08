<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Silahkan login terlebih dahulu"
        ];

        return view('v_login', $data);
    }
}
