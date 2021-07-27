<?php

namespace App\Models;

use CodeIgniter\Model;
class ModelAdmin extends Model
{   

    public function jml_gedung(){
        return $this->db->table('tbl_gedung')
        ->countAll();
    }
    public function jml_ruangan(){
        return $this->db->table('tbl_ruangan')
        ->countAll();
    }
    public function jml_fakultas(){
        return $this->db->table('tbl_fakultas')
        ->countAll();
    }
    public function jml_prodi(){
        return $this->db->table('tbl_prodi')
        ->countAll();
    }
    public function jml_dosen(){
        return $this->db->table('tbl_dosen')
        ->countAll();
    }

    public function jml_mhs(){
        return $this->db->table('tbl_mhs')
        ->countAll();
    }
    public function jml_matkul(){
        return $this->db->table('tbl_matkul')
        ->countAll();
    }
    public function jml_user(){
        return $this->db->table('tbl_user')
        ->countAll();
    }




}