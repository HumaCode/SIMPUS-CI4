<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{
    public function profileAnggota($id_anggota)
    {
        return $this->db->table('tbl_anggota')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_anggota.id_kelas', 'left')
            ->where('id_anggota', $id_anggota)
            ->get()
            ->getRowArray();
    }

    public function getAllData()
    {
        return $this->db->table('tbl_anggota')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_anggota.id_kelas', 'left')
            ->orderBy('id_anggota', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('tbl_anggota')->insert($data);
    }

    public function edit($id_anggota, $data)
    {
        $this->db->table('tbl_anggota')
            ->where('id_anggota', $id_anggota)
            ->update($data);
    }
}
