<?php

class Model_admin extends CI_Model{
    public function profil($username){
        $result = $this->db->where('username', $username)->get('tb_user');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function edit($where){
        return $this->db->get_where('tb_user', $where);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function update_password($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}