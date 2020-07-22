<?php

class Model_user extends CI_Model{
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

    public function update_password($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}