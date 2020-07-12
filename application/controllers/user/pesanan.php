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
            date_default_timezone_set('Asia/Jakarta');
            $username = $this->session->userdata('username');
            //$date = new DateTime("now");
            // $cur_date = $date->format('Y-m-d h:i:s');
            $date_now = date('Y-m-d H:i:s');
            $where = array(
                    'username' => $username,
                   'TIMESTAMP(batas_bayar) >' => $date_now,
                   'status !=' => 'batal'
                   
                   
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
            $data['id_komplain']=$this->model_invoice->ambil_id_komplain($id_invoice);
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
          $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Pesanan Dibatalkan</strong>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
          redirect('user/pesanan/index');
    }

    public function komplain($id){
        $data['id_invoice']=$this->model_invoice->ambil_id_invoice($id);
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/komplain', $data);
        $this->load->view('templates_user/footer');
    }

    public function kirim_komplain(){
            $id = $this->input->post('id');
            $komplain = $this->input->post('komplain');
            $where = array('id' => $id);
            $data_i = array(
                    'komplain' => 'Ya',
                    'proses' => 'komplain'
            );
            $data = array(
                    'id_invoice' => $id,
                    'komplain' => $komplain
            );
            $this->model_invoice->batal_pesan($where,$data_i, 'tb_invoice');
            $this->model_invoice->komplain($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Komplain Telah Dikirim</strong>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('user/pesanan/index');     
    }

    public function diterima($id){
        $where = array(
                'id' => $id
        );
        $data = array(
                'status' => 'diterima'
        );
        $this->model_invoice->batal_pesan($where,$data, 'tb_invoice');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>PesananDiterima, Pesanan Selesai</strong>
                  <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>');
        redirect('user/pesanan/index');
    }
}