<?php


class Profil extends CI_Controller{
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
        $username = $this->session->userdata('username');
        $data['user'] = $this->model_admin->profil($username);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/profil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->model_admin->edit($where, 'tb_user')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_profil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $id          =$this->input->post('id');
        $nama        =$this->input->post('nama');
        $username    =$this->input->post('username');
        $email       =$this->input->post('email');
        $no_tlp      =$this->input->post('no_tlp');
        $alamat      =$this->input->post('alamat');
        $role_id     =$this->input->post('role_id');

        $data = array(
            'nama'  =>$nama,
            'username'  =>$username,
            'email'     =>$email,
            'no_tlp'    =>$no_tlp,
            'alamat'    =>$alamat,
            'role_id'   =>$role_id
        );

        $where = array ('id' => $id);
        $this->model_admin->update_data($where, $data, 'tb_user');
        redirect('admin/profil');
    }

    public function ganti_password(){
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]',[
            'required' => 'Password Tidak Boleh Kosong!',
            'matches'   => 'Password Tidak Cocok!'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

        $username   =$this->session->userdata('username');
        $password_1 = $this->input->post('password_1');
        $password_2 = $this->input->post('password_2');

        if($this->form_validation->run()== FALSE){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_password');
        $this->load->view('templates_admin/footer');
        }else{
            $where = array('username' =>$username);
            $data = array('password' =>MD5($password_1));
            $this->model_admin->update_password($where, $data, 'tb_user');
            redirect('admin/profil');
        }


    }
}