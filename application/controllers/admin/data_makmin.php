<?php 

class Data_makmin extends CI_Controller{
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
        $data['makmin']= $this->model_makmin->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_makmin', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_makmin(){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_makmin');
        $this->load->view('templates_admin/footer');
    }
    
    public function tambah_aksi(){
        $this->form_validation->set_rules('nama_makmin', 'Nama Makmin', 'required|callback_alpha_check',[
            'required' => 'Nama Tidak Boleh Kosong !'
 
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]',[
            'required' => 'Harga Tidak Boleh Kosong !',
            'min_length' => 'Harga Terlalu Kecil !'
        ]);
        $this->form_validation->set_rules('gambar', 'gambar', 'callback_gambar_check');
        if($this->form_validation->run()==FALSE){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/tambah_makmin');
            $this->load->view('templates_admin/footer');
        }else{
        $nama_makmin    =$this->input->post('nama_makmin');
        $keterangan     =$this->input->post('keterangan');
        $kategori       =$this->input->post('kategori');
        $harga          =$this->input->post('harga');
        $gambar         =$_FILES['gambar']['name'];
        if($gambar=''){}else{
            $config['upload_path']='./uploads';
            $config['allowed_types']='jpg|jpeg|png|gif';

        
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar Gagal Diupload";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_makmin' =>$nama_makmin,
            'keterangan'  =>$keterangan,
            'kategori'    =>$kategori,
            'harga'       =>$harga,
            'gambar'      =>$gambar
        );
        $this->model_makmin->tambah_makmin($data, 'tb_makmin');
        
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Telah Ditambahkan !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/data_makmin/index','refresh');
        
     
    }
    }

    public function gambar_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['gambar']['name']);
        if(isset($_FILES['gambar']['name']) && $_FILES['gambar']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('gambar_check', 'Hanya Boleh Gambar gif/jpg/png.');
                return false;
            }
        }else{
            $this->form_validation->set_message('gambar_check', 'Gambar Tidak Boleh Kosong.');
            return false;
        }
    }

    public function alpha_check($fullname){
        if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_check', 'Hanya Boleh Menggunakan Huruf');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function edit($id){
        $where = array('id_makmin'=> $id);
        $data['makmin']= $this->model_makmin->edit($where, 'tb_makmin')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_makmin', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $this->form_validation->set_rules('nama_makmin', 'Nama Makmin', 'required|callback_alpha_check',[
            'required' => 'Nama Tidak Boleh Kosong !'
            
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]',[
            'required' => 'Harga Tidak Boleh Kosong !',
            'min_length' => 'Harga Terlalu Kecil !'
        ]);
        
        if($this->form_validation->run()==FALSE){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_makmin');
            $this->load->view('templates_admin/footer');
        }else{
        $id             =$this->input->post('id_makmin');
        $nama_makmin    =$this->input->post('nama_makmin');
        $keterangan     =$this->input->post('keterangan');
        $kategori       =$this->input->post('kategori');
        $harga          =$this->input->post('harga');
       
        $data = array(
            'nama_makmin' =>$nama_makmin,
            'keterangan'  =>$keterangan,
            'kategori'    =>$kategori,
            'harga'       =>$harga,
            
            
        );

        $where= array ('id_makmin' =>$id);

        $this->model_makmin->update_data($where, $data, 'tb_makmin');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Telah Ditambah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/data_makmin/index');
    }
    }
    public function hapus($id){
        $where= array('id_makmin'=> $id);
        $this->model_makmin->hapus_data($where, 'tb_makmin');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Telah Dihapus !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/data_makmin/index');
    }

    public function detail_makmin($id){
       $data['detail']= $this->model_makmin->detail_makmin($id);
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('admin/detail_makmin', $data);
       $this->load->view('templates_admin/footer');
    }
}