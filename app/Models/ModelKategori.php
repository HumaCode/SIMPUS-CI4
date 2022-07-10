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
}
