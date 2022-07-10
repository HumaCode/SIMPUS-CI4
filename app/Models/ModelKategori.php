<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_kategori')
            ->orderBy('id_kategori', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('tbl_kategori')->insert($data);
    }

    public function hapus($id_kategori)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $id_kategori)
            ->delete();
    }

    public function edit($id_kategori, $data)
    {
        $this->db->table('tbl_kategori')
            ->where('id_kategori', $id_kategori)
            ->update($data);
    }
}
