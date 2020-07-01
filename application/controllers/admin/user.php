<?php 



class User extends CI_Controller{
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
        $data['user']=$this->model_user_list->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/list_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi(){
        $nama            =$this->input->post('nama');
        $username        =$this->input->post('username');
        $email           =$this->input->post('email');
        $no_tlp          =$this->input->post('no_tlp');
        $alamat          =$this->input->post('alamat');
        $gambar          =$_FILES['gambar']['name'];
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
            'nama' =>$nama,
            'username'  =>$username,
            'email'    =>$email,
            'no_tlp'       =>$no_tlp,
            'alamat'    =>$alamat,
            'gambar'      =>$gambar
        );
        $this->model_user_list->tambah_makmin($data, 'tb_user');
        redirect('admin/data_makmin/index');
    }

    public function edit($id){
        $where = array('id'=> $id);
        $data['makmin']= $this->model_user_list->edit($where, 'tb_user')->result();
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

        $this->model_user_list->update_data($where, $data, 'tb_user');
        redirect('admin/data_makmin/index');
    }
    public function hapus($id){
        $where= array('id_makmin'=> $id);
        $this->model_user_list->hapus_data($where, 'tb_user');
        redirect('admin/data_makmin/index');
    }

    public function detail_makmin($id){
       $data['detail']= $this->model_user_list->detail_makmin($id);
       $this->load->view('templates_admin/header');
       $this->load->view('templates_admin/sidebar');
       $this->load->view('admin/detail_makmin', $data);
       $this->load->view('templates_admin/footer');
    }
}