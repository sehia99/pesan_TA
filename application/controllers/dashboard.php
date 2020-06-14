<?php

    class Dashboard extends CI_Controller{
        public function __construct(){
            parent::__construct();
            if($this->session->userdata('role_id') !='2'){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum Login</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
            }#elseif($this->session->userdata('role_id') =='1'){
              #  redirect('admin/dashboard_admin');
            #}
        }

        
        public function tambah_ke_keranjang($id){
            $makmin = $this->model_makmin->find($id);
            $data = array(
                'id'    =>$makmin->id_makmin,
                'qty'   =>1,
                'price' =>$makmin->harga,
                'name'  =>$makmin->nama_makmin
            );
            $this->cart->insert($data);
            redirect('welcome');
        }

        public function detail_keranjang(){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('keranjang');
            $this->load->view('templates/footer');
        }

        public function hapus_keranjang(){
            $this->cart->destroy();
            redirect('welcome');
        }

        public function pembayaran(){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pembayaran');
            $this->load->view('templates/footer');
        }

        public function proses_pesanan(){
            $is_processed = $this->model_invoice->index();
            if($is_processed){
                $this->cart->destroy();
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('proses_pesanan');
                $this->load->view('templates/footer');
            }else{
                echo "Maaf, Pesanan Anda Gagal!";
            }
            
        }
        public function detail($id_makmin){
            $data['makmin'] = $this->model_makmin->detail_makmin($id_makmin);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('detail_makmin', $data);
            $this->load->view('templates/footer');
        }
    }


