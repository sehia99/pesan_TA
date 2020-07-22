<?php

class Model_admin extends CI_Model{
    public function profil($username){
        $this->db->select('tb_user.*, wilayah_provinsi.nama as nama_prov, wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des');
        $this->db->from('tb_user');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id = tb_user.prov', 'left');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tb_user.kab', 'left');
        $this->db->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tb_user.kec', 'left');
        $this->db->join('wilayah_desa', 'wilayah_desa.id = tb_user.des', 'left');
        $this->db->where('username', $username);
        $result = $this->db->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function edit($where){
         $this->db->select('tb_user.*, wilayah_provinsi.nama as nama_prov, wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des');
        $this->db->from('tb_user');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id = tb_user.prov', 'left');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tb_user.kab', 'left');
        $this->db->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tb_user.kec', 'left');
        $this->db->join('wilayah_desa', 'wilayah_desa.id = tb_user.des', 'left');
        $this->db->where($where);
        return $this->db->get();
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