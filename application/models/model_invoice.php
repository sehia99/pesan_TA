<?php

class Model_invoice extends CI_Model{
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->session->userdata('nama');
        $alamat = $this->session->userdata('alamat');
        $no_tlp = $this->session->userdata('no_tlp');
        $username = $this->session->userdata('username');

        $invoice = array(
            'username'  =>$username,
            'nama'  =>$nama,
            'alamat'    => $alamat,
            'no_tlp'    =>$no_tlp,
            'tgl_pesan' =>date('Y-m-d H:i:s'),
            'batas_bayar'   => date('Y-m-d H:i:s', mktime(date('H')+5, date('i'), date('s'), date('m'), date('d'), date('Y')))
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach($this->cart->contents() as $item){
            $data = array (
                'id_invoice'    =>$id_invoice,
                'id_makmin'     =>$item['id'],
                'username'      =>$username,
                'nama_makmin'   =>$item['name'],
                'jumlah'        =>$item['qty'],
                'harga'         =>$item['price']
            );
            $this->db->insert('tb_pesanan', $data);
        }
        return TRUE;
    }
    public function tampil_data(){
        $this->db->select('tb_invoice.*, tb_pembayaran.id_invoice')->from('tb_invoice')->join('tb_pembayaran', 'tb_pembayaran.id_invoice=tb_invoice.id', 'left');
        $result = $this->db->get();
        if($result->num_rows() >0){
            return $result->result();
        }else{
            return false;
        }
    }
    public function ambil_id_invoice($id_invoice){
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function invoice_user($username){
        $result = $this->db->where('username', $username)->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function detail_invoice_user($id_invoice){
        $result = $this->db->where('id', $id_invoice)->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
    
    public function ambil_id_pesanan($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function data_pembayaran($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pembayaran');
        if($result->num_rows() >0){
            return $result->result();
        }else{
            return false;
        }
    }
    public function ambil_id_bayar($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_pembayaran');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function confirm_bayar($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function batal_pesan($where,$data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}