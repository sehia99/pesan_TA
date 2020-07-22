<?php 


class Model_kategori extends CI_Model{

    public function data_makanan($where){
        return $this->db->get_where('tb_makmin', $where);
    }
    public function data_minuman($where){
        return $this->db->get_where('tb_makmin', $where);
    }
}