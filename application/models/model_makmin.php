<?php

class Model_makmin extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tb_makmin');
    }

    public function tampil_data_home($where)
    {
        $this->db->where($where);
        return $this->db->get('tb_makmin');
    }

    public function tambah_makmin($data, $table){
        $this->db->insert($table, $data);
    }

    public function edit($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function find($id){
        $result = $this->db->where('id_makmin', $id)->limit(1)->get('tb_makmin');
        if($result->num_rows()>0){
            return $result->row();
        }else{
            return array();
        }
    }
    public function detail_makmin($id_makmin){
        $result = $this->db->where('id_makmin', $id_makmin)->get('tb_makmin');
        if($result->num_rows()>0){
            return $result->result();
        }else{
            return false;
        }
    }
}