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

    public function slider()
    {
        $data = [
            "title"     => "Data Slider",
            "menu"      => "pengaturan",
            "submenu"   => "slider",
            "slider"    => $this->ModelPengaturan->slider(),
            "page"      => "v_slider"
        ];

        return view('v_template_admin', $data);
    }

    public function editSlider($id_slider)
    {
        if ($this->validate([

            'slider' => [
                'label' => 'Slider',
                'rules' => 'uploaded[slider]|max_size[slider, 1024]|mime_in[slider,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size'  => '{field} maksimal 1 MB.!!',
                    'mime_in'   => 'File yang diupload bukan berformat gambar.!!',
                ]
            ],


        ])) {

            $fileFoto   = $this->request->getFile('slider');
            $id_slider = $this->request->getPost('id_slider');



            $slider = $fileFoto->getRandomName();

            $anggota = $this->ModelPengaturan->sliderById($id_slider);

            // return $anggota['slider'];

            // unlink
            $fotolama = $anggota['slider'];
            if ($fotolama != '') {
                unlink('img/slider/' . $fotolama);
            }

            $data = [
                'slider'        => $slider,
            ];

            $fileFoto->move('img/slider', $slider);


            $this->ModelPengaturan->editSlider1($id_slider, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('pengaturan/slider'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('pengaturan/slider'))->withInput('validation',  \Config\Services::validation());
        }
    }
}
