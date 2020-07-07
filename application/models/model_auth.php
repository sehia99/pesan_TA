<?php 

class Model_auth extends CI_Model{
    public function cek_login(){
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)->where('password', MD5($password))->limit(1)->get('tb_user');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function update_resset_key($email, $resset_key){
        $this->db->where('email', $email);
        $data = array('resset_password' => $resset_key);
        $this->db->update('tb_user', $data);
        if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function resset_password($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ambil_key($resset_key){
            $result = $this->db->where('resset_password', $resset_key)->limit(1)->get('tb_user');
            if($result->num_rows() > 0){
                return $result->row();
            }else{
                return false;
            }
    }
}