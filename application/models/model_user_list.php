<?php



class Model_user_list extends CI_Model{
    public function tampil_data(){
      return  $this->db->get('tb_user'); 
    }
}