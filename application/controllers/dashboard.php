<?php

    class Dashboard extends CI_Controller{
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
            }#elseif($this->session->userdata('role_id') =='1'){
              #  redirect('admin/dashboard_admin');
            #}
        }

        
        public function tambah_ke_keranjang(){
            $id = $this->input->post('id');
            $jumlah = $this->input->post('jumlah');
            $makmin = $this->model_makmin->find($id);
            $data = array(
                'id'    =>$makmin->id_makmin,
                'qty'   =>$jumlah,
                'price' =>$makmin->harga,
                'name'  =>$makmin->nama_makmin,
                'stok' =>$makmin->stok
            );
            if($jumlah > $makmin->stok){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Tidak Bisa Pesan Lebih Dari Stok Yang Tersedia!</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('welcome');
            }else{
            $this->cart->insert($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Ditambah Ke Keranjang</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('welcome');
        }
        }

        public function detail_keranjang(){
             $username = $this->session->userdata('username');
             //$get_prov = $this->db->select('*')->order_by('nama', 'ASC')->from('wilayah_provinsi')->get();
        $get_kab = $this->db->select('*')->order_by('nama', 'ASC')->from('wilayah_kabupaten')->where('provinsi_id', '33')->get();    
        //$data['provinsi'] = $get_prov->result();  
        $data['kabupaten'] = $get_kab->result(); 
        $data['user'] = $this->model_user->profil($username);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('keranjang',$data);
            $this->load->view('templates/footer');
        }

        public function update_keranjang()
        {
            $rowid = $this->input->post('rowid');
            $qty   = $this->input->post('qty');
            $data  = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $this->cart->update($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Keranjang Telah Diupdate</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('dashboard/detail_keranjang');
        }

        public function hapus_item_keranjang($rowid)
        {
            $this->cart->remove($rowid);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Keranjang Telah Diupdate</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('dashboard/detail_keranjang');
        }

        public function hapus_keranjang(){
            $this->cart->destroy();
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Keranjang Telah Kosong</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('dashboard/detail_keranjang');
        }

        public function pembayaran(){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pembayaran');
            $this->load->view('templates/footer');
        }

        public function proses_pesanan(){
            $alamat =$this->input->post('alamat');
            $prov =$this->input->post('prov');
            $kab =$this->input->post('kab');
            $kec =$this->input->post('kec');
            $des =$this->input->post('des');
            if($this->cart->contents() != NULL ) {
            if($kab == '3329' ){
            $is_processed = $this->model_invoice->index($alamat , $prov, $kab, $kec, $des);
            if($is_processed){
                $this->cart->destroy();
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('proses_pesanan');
                $this->load->view('templates/footer');
            }else{
                echo "Maaf, Pesanan Anda Gagal!";
            }
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Untuk Saat Ini Hanya Untuk Kab. Brebes !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('dashboard/detail_keranjang');
            }
        }else{
           $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Keranjang Kosong !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('dashboard/detail_keranjang'); 
        }
    }
        
    }


