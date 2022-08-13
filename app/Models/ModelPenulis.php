<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenulis extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_penulis')
            ->orderBy('id_penulis', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('tbl_penulis')->insert($data);
    }

    public function hapus($id_penulis)
    {
        $this->db->table('tbl_penulis')
            ->where('id_penulis', $id_penulis)
            ->delete();
    }

    public function edit($id_penulis, $data)
    {
        $this->db->table('tbl_penulis')
            ->where('id_penulis', $id_penulis)
            ->update($data);
    }
}
