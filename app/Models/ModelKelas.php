<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_kelas')
            ->orderBy('id_kelas', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function hapus($id_kelas)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $id_kelas)
            ->delete();
    }

    public function edit($id_kelas, $data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $id_kelas)
            ->update($data);
    }
}
