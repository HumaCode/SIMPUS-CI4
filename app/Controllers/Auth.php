<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Login",
            "page" => "v_login"
        ];

        return view('v_template_login', $data);
    }

    public function loginUser()
    {
        $data = [
            "title" => "Login Admin",
            "page" => "v_login_user"
        ];

        return view('v_template_login', $data);
    }

    public function loginAnggota()
    {
        $data = [
            "title" => "Login Anggota",
            "page" => "v_login_anggota"
        ];

        return view('v_template_login', $data);
    }
}
