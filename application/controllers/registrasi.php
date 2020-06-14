<?php 


class Registrasi extends CI_Controller{
    public function index(){
        $this->form_validation->set_rules('nama', 'Nama', 'required',[
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required',[
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required',[
            'required' => 'Email Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]',[
            'required' => 'Password Tidak Boleh Kosong!',
            'matches'   => 'Password Tidak Cocok!'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]');

        if($this->form_validation->run() == FALSE){
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('registrasi');
        $this->load->view('templates/footer');
        }else{
            $data = array(
                'id'    =>'',
                'username'  =>$this->input->post('username'),
                'nama'  =>$this->input->post('nama'),
                'password'  =>MD5($this->input->post('password_1')),
                'email'  =>$this->input->post('email'),
                'role_id'   =>2
            );
            $this->db->insert('tb_user', $data);
            redirect('auth/login');
        }
    }
}