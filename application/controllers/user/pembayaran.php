<?php

class Pembayaran extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') !='2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login Sebagai Pelanggan</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/login');
        }
    }
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