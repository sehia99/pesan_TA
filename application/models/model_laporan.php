<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

	public function tampil_data($where)
	{
		$this->db->select('tb_invoice.*,tb_pesanan.subtotal,sum(tb_pesanan.subtotal) as total')->from('tb_invoice')->join('tb_pesanan', 'tb_pesanan.id_invoice=tb_invoice.id', 'left')->where($where);
		$this->db->group_by(['tb_invoice.id', 'tb_pesanan.id_invoice']);
        $this->db->order_by('id', 'ACS');
        $result = $this->db->get();
        if($result->num_rows() >0){
            return $result->result();
        }else{
            return false;
        }
	}

	public function get_laporan($where, $start, $end)
	{	
		$this->db->select('tb_invoice.*,tb_pesanan.subtotal,sum(tb_pesanan.subtotal) as total');
		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_pesanan.id_invoice=tb_invoice.id', 'left');
		$this->db->where($where);
		$this->db->where('DATE(tgl_pesan) >=',$start);
		$this->db->where('DATE(tgl_pesan) <=', $end);
		$this->db->group_by(['tb_invoice.id', 'tb_pesanan.id_invoice']);
        $this->db->order_by('id', 'ACS');
        $result = $this->db->get();
        if($result->num_rows() >0){
            return $result->result();
        }else{
            return false;
        }
	}

}

/* End of file model_laporan.php */
/* Location: ./application/models/model_laporan.php */