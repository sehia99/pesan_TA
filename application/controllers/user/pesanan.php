<?php 


class Pesanan extends CI_Controller{
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
    public function index(){
            $username = $this->session->userdata('username');
            $date = new DateTime("now");
             $cur_date = $date->format('Y-m-d h:i:s');
            $where = array(
                    'username' => $username,
                   'DATE(batas_bayar) >' => $cur_date
            );
            $data['invoice']=$this->model_invoice->invoice_user($where);
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/pesanan', $data);
            $this->load->view('templates_user/footer');
    }

    public function detail($id_invoice){
            $data['invoice']=$this->model_invoice->detail_invoice_user($id_invoice);
            $data['pesanan']=$this->model_invoice->ambil_id_pesanan($id_invoice);
            $data['id_invoice']=$this->model_invoice->ambil_id_invoice($id_invoice);
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/detail_pesanan', $data);
            $this->load->view('templates_user/footer');
    }

    public function batal_pesan($id_invoice){
          $where = array(
                  'id' => $id_invoice
          );
          $data = array(
                  'status' => 'batal'
          );
          $this->model_invoice->batal_pesan($where,$data, 'tb_invoice');
          redirect('user/pesanan/index');
    }
}