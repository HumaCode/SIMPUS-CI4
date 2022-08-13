<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            "title"     => "User",
            "menu"      => "user",
            "submenu"   => "",
            "page"      => "v_user",
            "user"      => $this->ModelUser->getAllData(),
        ];

        return view('v_template_admin', $data);
    }

    public function tambah()
    {
        $filefoto = $this->request->getFile('file');
        $id_user = session()->get('id_user');
        $user = $this->ModelUser->getDataById($id_user);

        if ($filefoto == '') {
            $data = [
                'nama_user' => htmlspecialchars($this->request->getPost('nama')),
                'email'     => htmlspecialchars($this->request->getPost('email')),
                'password'  => htmlspecialchars($this->request->getPost('password')),
                'level'     => htmlspecialchars($this->request->getPost('level')),
            ];
        } else {

            $filefoto->move('img/user', $filefoto->getName() . date('i') . '.' . $filefoto->getExtension());

            $data = [
                'nama_user' => htmlspecialchars($this->request->getPost('nama')),
                'email' => htmlspecialchars($this->request->getPost('email')),
                'password'  => htmlspecialchars($this->request->getPost('password')),
                'level' => htmlspecialchars($this->request->getPost('level')),
                'foto' =>  $filefoto->getName()
            ];
        }

        $this->ModelUser->tambah($data);

        session()->setFlashdata('pesan', 'Berhasil menambah data');
        return redirect()->to(base_url('user'));
    }

    public function edit($id_user)
    {

        $filefoto = $this->request->getFile('file');
        $id_user = session()->get('id_user');
        $user = $this->ModelUser->getDataById($id_user);

        if ($filefoto == '') {
            $data = [
                'nama_user' => htmlspecialchars($this->request->getPost('nama')),
                'email' => htmlspecialchars($this->request->getPost('email')),
                'level' => htmlspecialchars($this->request->getPost('level')),
            ];
        } else {

            // unlink
            $fotolama = $user['foto'];
            if ($fotolama <> '') {
                unlink('img/user/' . $fotolama);
            }

            $filefoto->move('img/user', $user['id_user'] . '.' . $filefoto->getExtension());

            $data = [
                'nama_user' => htmlspecialchars($this->request->getPost('nama')),
                'email' => htmlspecialchars($this->request->getPost('email')),
                'level' => htmlspecialchars($this->request->getPost('level')),
                'foto' =>  $filefoto->getName()
            ];
        }

        $this->ModelUser->edit($id_user, $data);

        session()->setFlashdata('pesan', 'Berhasil mengedit data');
        return redirect()->to(base_url('user'));
    }

    public function hapus($id_user)
    {
        $user = $this->ModelUser->getDataById($id_user);

        // unlink
        $fotolama = $user['foto'];
        if ($fotolama <> '') {
            unlink('img/user/' . $fotolama);
        }

        $this->ModelUser->hapus($id_user);

        session()->setFlashdata('pesan', 'Berhasil dihapus');
        return redirect()->to(base_url('user'));
    }
}
