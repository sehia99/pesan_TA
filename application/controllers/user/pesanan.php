<?php 


class Pesanan extends CI_Controller{
    public function index(){
            $data['invoice']=$this->model_invoice->ambil_id_invoice($id_invoice);
            $data['pesanan']=$this->model_invoice->ambil_id_pesanan($id_invoice);
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/pesanan', $data);
            $this->load->view('templates_user/footer');
    }
}