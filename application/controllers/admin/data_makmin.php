<?php 

class Data_makmin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') !='1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login</strong>
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
    public function tambah_aksi(){
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
        redirect('admin/data_makmin/index');
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
        redirect('admin/data_makmin/index');
    }
    public function hapus($id){
        $where= array('id_makmin'=> $id);
        $this->model_makmin->hapus_data($where, 'tb_makmin');
        redirect('admin/data_makmin/index');
    }
}