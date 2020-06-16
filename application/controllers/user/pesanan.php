<?php 


class Pesanan extends CI_Controller{
    public function index(){
            $username = $this->session->userdata('username');
            $data['invoice']=$this->model_invoice->invoice_user($username);
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
}