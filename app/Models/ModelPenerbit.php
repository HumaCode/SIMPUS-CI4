<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenerbit extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_penerbit')
            ->orderBy('id_penerbit', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('tbl_penerbit')->insert($data);
    }

    public function hapus($id_penerbit)
    {
        $this->db->table('tbl_penerbit')
            ->where('id_penerbit', $id_penerbit)
            ->delete();
    }

    public function edit($id_penerbit, $data)
    {
        $this->db->table('tbl_penerbit')
            ->where('id_penerbit', $id_penerbit)
            ->update($data);
    }
}
