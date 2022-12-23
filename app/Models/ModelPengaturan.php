<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengaturan extends Model
{
    public function getDataById()
    {
        return $this->db->table('tbl_web')
            ->where('id_web', 1)
            ->get()
            ->getRowArray();
    }

    public function slider()
    {
        return $this->db->table('tbl_slider')
            ->orderBy('id_slider', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function sliderById($id_slider)
    {
        return $this->db->table('tbl_slider')
            ->where('id_slider', $id_slider)
            ->get()
            ->getRowArray();
    }


    public function editSlider1($id_slider, $data)
    {
        $this->db->table('tbl_slider')
            ->where('id_slider', $id_slider)
            ->update($data);
    }


    public function updateWeb($data)
    {
        $this->db->table('tbl_web')
            ->where('id_web', 1)
            ->update($data);
    }
}
