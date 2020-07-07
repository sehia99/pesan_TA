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

    function check_unique_user_email($id = '', $email) {
        $this->db->where('email', $email);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('tb_user')->num_rows();
    }

    function check_unique_username($id = '', $username) {
        $this->db->where('username', $username);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('tb_user')->num_rows();
    }

    public function update_password($where, $data, $table){
        $this->db->where($where);
       $sql= $this->db->update($table, $data);
        if($this->db->affected_rows() >=0){
            return TRUE;
        }else{
            return FALSE;
        };
    }

    public function ambil_username($username){
        $result = $this->db->where('username', $username)->limit(1)->get('tb_user');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }
}