<?php

namespace App\Models;

use CodeIgniter\Model;
class ModelUser extends Model
{
    public function allData()
    {
        return $this->db->table('tbl_user')
        ->orderBy('id_user','DESC')
        ->get()->getResultArray();
    }

    public function detail_data($id_user)
    {
        return $this->db->table('tbl_user')
        ->where('id_user', $id_user)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('tbl_user')
        ->insert($data);
    }

    public function edit($data){
        $this->db->table('tbl_user')
        ->where('id_user' , $data['id_user'])
        ->update($data);

    }

    public function delete_data($data){
        $this->db->table('tbl_user')
        ->where('id_user' , $data['id_user'])
        ->delete($data);
    }

    
}