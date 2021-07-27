<?php

namespace App\Models;

use CodeIgniter\Model;
class ModelJadwalKuliah extends Model
{
    public function allData($id_prodi){
        return $this->db->table('tbl_jadwal')
        ->join('tbl_matkul' , 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul', 'left')
        // ->join('tbl_fakultas' , 'tbl_fakultas.id_fakultas = tbl_prodi.id_fakultas', 'left')
        ->join('tbl_prodi' , 'tbl_prodi.id_prodi = tbl_jadwal.id_prodi', 'left')
        ->join('tbl_dosen' , 'tbl_dosen.id_dosen = tbl_jadwal.id_dosen', 'left')
        ->join('tbl_ruangan' , 'tbl_ruangan.id_ruangan = tbl_jadwal.id_ruangan', 'left')
        ->join('tbl_kelas' , 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
        ->where('tbl_jadwal.id_prodi' , $id_prodi)
        ->orderBy('tbl_matkul.smt','ASC')
        ->get()->getResultArray();
    }

    public function matkul($id_prodi){
        return $this->db->table('tbl_matkul')
        ->where('id_prodi', $id_prodi)
        ->orderBy('smt','ASC')
        ->get()->getResultArray();
    }

    
    public function kelas($id_prodi){

        return $this->db->table('tbl_kelas')
        ->where('id_prodi', $id_prodi)
        ->orderBy('nama_kelas','ASC')
        ->get()->getResultArray();
        
    }

    public function add($data){
        $this->db->table('tbl_jadwal')->insert($data);
    }

    public function delete_data($data){
        $this->db->table('tbl_jadwal')
        ->where('id_jadwal' , $data['id_jadwal'])
        ->delete($data);
    }

}