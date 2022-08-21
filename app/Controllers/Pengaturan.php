<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengaturan;
use PHPUnit\TextUI\XmlConfiguration\IniSetting;

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

    public function updateWeb()
    {
        $filelogo = $this->request->getFile('file');

        if ($filelogo == '') {
            $data = [
                'nama_sekolah'      => htmlspecialchars($this->request->getPost('sekolah')),
                'alamat'            => htmlspecialchars($this->request->getPost('alamat')),
                'kecamatan'         => htmlspecialchars($this->request->getPost('kec')),
                'kabupaten'         => htmlspecialchars($this->request->getPost('kab')),
                'no_tlp'            => htmlspecialchars($this->request->getPost('tlp')),
                'kd_pos'            => htmlspecialchars($this->request->getPost('kd_pos')),
            ];
        } else {
            $setting = $this->ModelPengaturan->getDataById();


            $nama_logo = $filelogo->getRandomName();

            // unlink
            $logolama = $setting['logo'];
            if ($logolama != '') {
                unlink('logo/' . $logolama);
            }



            $data = [
                'nama_sekolah'      => htmlspecialchars($this->request->getPost('sekolah')),
                'alamat'            => htmlspecialchars($this->request->getPost('alamat')),
                'kecamatan'         => htmlspecialchars($this->request->getPost('kec')),
                'kabupaten'         => htmlspecialchars($this->request->getPost('kab')),
                'no_tlp'            => htmlspecialchars($this->request->getPost('tlp')),
                'logo'              => $nama_logo,
                'kd_pos'            => htmlspecialchars($this->request->getPost('kd_pos')),
            ];

            $filelogo->move('logo', $nama_logo);
        }

        $this->ModelPengaturan->updateWeb($data);

        session()->setFlashdata('pesan', 'Berhasil mengedit data');
        return redirect()->to(base_url('pengaturan/web'));
    }
}
