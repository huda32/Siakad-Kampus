<?php

namespace App\Models;

use CodeIgniter\Model;
class ModelFakultas extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_fakultas')
        ->orderBy('id_fakultas','DESC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('tbl_fakultas')
        ->insert($data);
    }

    public function edit($data){
        $this->db->table('tbl_fakultas')
        ->where('id_fakultas' , $data['id_fakultas'])
        ->update($data);

    }

    public function delete_data($data){
        $this->db->table('tbl_fakultas')
        ->where('id_fakultas' , $data['id_fakultas'])
        ->delete($data);
    }
}