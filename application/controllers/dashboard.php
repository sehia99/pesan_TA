<?php

    class Dashboard extends CI_Controller{
        public function index(){
            $data['makmin']=$this->model_makmin->tampil_data()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard', $data);
            $this->load->view('templates/footer');
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
            redirect('dashboard');
        }

        public function detail_keranjang(){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('keranjang');
            $this->load->view('templates/footer');
        }

        public function hapus_keranjang(){
            $this->cart->destroy();
            redirect('dashboard/index');
        }

        public function pembayaran(){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pembayaran');
            $this->load->view('templates/footer');
        }

        public function proses_pesanan(){
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        }
    }


