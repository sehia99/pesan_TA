<?php

class Pembayaran extends CI_Controller{
    public function index($id_invoice){
        $data['id_invoice']=$this->model_invoice->ambil_id_invoice($id_invoice);
        $data['metode'] = $this->db->get('tb_rekening')->result();
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/pembayaran', $data);
        $this->load->view('templates_user/footer');
    }
    
    public function proses_bayar(){
        $id_invoice     = $this->input->post('id_invoice');
        $nama_peng      = $this->input->post('nama_peng');
        $no_peng        = $this->input->post('no_peng');
        $gambar         =$_FILES['gambar']['name'];
        if($gambar=''){}else{
            $config['upload_path']='./uploads/pembayaran';
            $config['allowed_types']='jpg|jpeg|png|gif';

        
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal Diupload";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array(
            'id_invoice' =>$id_invoice,
            'nama_peng'  =>$nama_peng,
            'no_peng'   =>$no_peng,
            'gambar'      =>$gambar
        );
        $this->model_pembayaran->tambah_bayar($data, 'tb_pembayaran');
        redirect('user/pesanan');
    }
}