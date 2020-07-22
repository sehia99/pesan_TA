<?php

class Invoice extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') !='1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login Sebagai Admin</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('auth/login');
        }
    }

    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime("now");
        $cur_date = $date->format('Y-m-d');
        $cur_time = date('Y-m-d H:i:s');
        $where = array('DATE(tgl_pesan)' => $cur_date,
                        'status !=' => 'batal'
    );
        $order = array('id' => 'DESC');
        $data['invoice'] = $this->model_invoice->tampil_data($where, $order);
        //$data['id_komplain']=$this->model_invoice->ambil_id_komplain($id_invoice);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }
    public function detail($id_invoice){
        $data['invoice']=$this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan']=$this->model_invoice->ambil_id_pesanan($id_invoice);
        $data['pembayaran']=$this->model_invoice->data_pembayaran($id_invoice);
        $data['cek']= $this->model_invoice->ambil_id_bayar($id_invoice);
        $data['komplain'] =$this->model_invoice->ambil_komplain($id_invoice);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function confirm_pesanan($id_invoice)
    {
        $where = array('id' => $id_invoice);
        $data = array('status' => 'pesanan_confirm');
        $this->model_invoice->confirm_bayar($where, $data, 'tb_invoice');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pesanan Berhasil Di konfirmasi !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/invoice/index');
    }

    public function confirm_bayar(){
        $id_invoice = $this->input->post('id');
        $estimasi = $this->input->post('estimasi');
        $where = array('id' =>$id_invoice);
        $data= array('status' => 'bayar_confirm',
                    'estimasi' => $estimasi,
                    'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+1, date('Y')))
    );
        $this->model_invoice->confirm_bayar($where, $data, 'tb_invoice');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pembayaran Berhasil Di konfirmasi !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/invoice/index');
    }

    public function kirim_pesanan($id){
        $where = array('id' => $id);
        $data = array(
        'status' => 'dikirim'
    );
        $this->model_invoice->confirm_bayar($where, $data, 'tb_invoice');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pesanan Selesai !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/invoice');
    }

    public function gagal_bayar($id)
    {
        $where = array(
            'id' => $id
        );
        $data = array(
            'status' => 'bayar_ditolak'
        );
        $where_b = array('id_invoice' => $id );
        $this->model_invoice->confirm_bayar($where, $data, 'tb_invoice');
        $this->model_invoice->tolak_bayar($where_b , 'tb_pembayaran');
         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pembayaran Ditolak !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/invoice');
    }
}