<?php


class Model_pembayaran extends CI_Model{
    public function tambah_bayar($data, $table){
        $this->db->insert($table, $data);
    }
}