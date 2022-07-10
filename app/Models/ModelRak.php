<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRak extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_rak')
            ->orderBy('id_rak', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('tbl_rak')->insert($data);
    }

    public function hapus($id_rak)
    {
        $this->db->table('tbl_rak')
            ->where('id_rak', $id_rak)
            ->delete();
    }

    public function edit($id_rak, $data)
    {
        $this->db->table('tbl_rak')
            ->where('id_rak', $id_rak)
            ->update($data);
    }
}
