<?php

class Model_makmin extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tb_makmin');
    }
}