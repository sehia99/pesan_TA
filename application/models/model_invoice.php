<?php

class Model_invoice extends CI_Model{
    public function index($alamat , $prov, $kab, $kec, $des){
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->session->userdata('nama');
        $no_tlp = $this->session->userdata('no_tlp');
        $username = $this->session->userdata('username');

        $invoice = array(
            'username'  =>$username,
            'nama'  =>$nama,
            'alamat'    => $alamat,
            'prov'    => $prov,
            'kab'    => $kab,
            'kec'    => $kec,
            'des'    => $des,
            'no_tlp'    =>$no_tlp,
            'tgl_pesan' =>date('Y-m-d H:i:s'),
            'batas_bayar'   => date('Y-m-d H:i:s', mktime(date('H')+5, date('i'), date('s'), date('m'), date('d'), date('Y')))
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach($this->cart->contents() as $item){
            if($this->cart->total() >= 40000){
                $subtotal = $item['qty'] * $item['price'];
            $data = array (
                'id_invoice'    =>$id_invoice,
                'id_makmin'     =>$item['id'],
                'username'      =>$username,
                'nama_makmin'   =>$item['name'],
                'jumlah'        =>$item['qty'],
                'harga'         =>$item['price'],
                'subtotal'      =>$subtotal
            );
            $this->db->insert('tb_pesanan', $data);
            $where_s = array('id_makmin' => $item['id']);
            //$data_s = array(
            //    'stok' => 'stok' - $item['qty']
           // );
            $stock=$item['stok']-$item['qty'];
            $data_s = array('stok' => $stock);
            $this->db->where($where_s);
            $this->db->update('tb_makmin', $data_s);
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Min Pemesanan Adalah Rp. 40.000 !</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
           
            redirect('welcome');
        }
        }
        return TRUE;
    }
    public function tampil_data($where){
        //$this->db->where($where);
        $this->db->select('tb_invoice.*, tb_pembayaran.id_invoice, wilayah_provinsi.nama as nama_prov, wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des');
        $this->db->from('tb_invoice');
        $this->db->join('tb_pembayaran', 'tb_pembayaran.id_invoice=tb_invoice.id', 'left');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id = tb_invoice.prov', 'left');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tb_invoice.kab', 'left');
        $this->db->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tb_invoice.kec', 'left');
        $this->db->join('wilayah_desa', 'wilayah_desa.id = tb_invoice.des', 'left');
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
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

    public function invoice_user($where){
        $result = $this->db->where($where)->order_by('id', 'DESC')->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function detail_invoice_user($id_invoice){
        $this->db->select('tb_invoice.*, tb_pembayaran.id_invoice, wilayah_provinsi.nama as nama_prov, wilayah_kabupaten.nama as nama_kab, wilayah_kecamatan.nama as nama_kec, wilayah_desa.nama as nama_des');
        $this->db->from('tb_invoice');
        $this->db->join('tb_pembayaran', 'tb_pembayaran.id_invoice=tb_invoice.id', 'left');
        $this->db->join('wilayah_provinsi', 'wilayah_provinsi.id = tb_invoice.prov', 'left');
        $this->db->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tb_invoice.kab', 'left');
        $this->db->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tb_invoice.kec', 'left');
        $this->db->join('wilayah_desa', 'wilayah_desa.id = tb_invoice.des', 'left');
        $this->db->where('tb_invoice.id', $id_invoice);
        $result = $this->db->get();
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

    public function komplain($data){
        $this->db->insert('tb_komplain', $data);
    }

    public function ambil_id_komplain($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_komplain');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function ambil_komplain($id_invoice){
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_komplain');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function tolak_bayar($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}