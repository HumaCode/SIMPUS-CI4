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

    public function updateWeb($data)
    {
        $this->db->table('tbl_web')
            ->where('id_web', 1)
            ->update($data);
    }
}
