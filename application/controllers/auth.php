<?php

class Auth extends CI_Controller{
    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'required',[
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required',[
            'required' => 'Password Tidak Boleh Kosong!'
        ]);
        if($this->form_validation->run() == FALSE){
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('form_login');
        $this->load->view('templates/footer');
        }else{
            $auth= $this->model_auth->cek_login();
            if($auth == FALSE){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password Anda Salah! </strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/login');
            }else{
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('gambar', $auth->gambar);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('alamat', $auth->alamat);
                $this->session->set_userdata('no_tlp', $auth->no_tlp);

                switch($auth->role_id){
                    case 1 :    redirect('admin/invoice');
                    break;
                    case 2 :    redirect('welcome');
                    break;
                    default : break;
                }
            }
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function resset_password(){
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('resset_password');
        $this->load->view('templates/footer');
    }

    public function resset_password_validation(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        if($this->form_validation->run()){
        $email      = $this->input->post('email');
        $resset_key = random_string('alnum', 50);

        if($this->model_auth->update_resset_key($email, $resset_key)){
            
				$config = array();
				$config['charset'] = 'utf-8';
				$config['useragent'] = 'Codeigniter';
				$config['protocol']= "smtp";
				$config['mailtype']= "html";
				$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
				$config['smtp_port']= "465";
				$config['smtp_timeout']= "5";
				$config['smtp_user']= "lulasaribrebes@gmail.com"; // isi dengan email kamu
				$config['smtp_pass']= "Respektor12"; // isi dengan password kamu
				$config['crlf']="\r\n"; 
				$config['newline']="\r\n"; 
				$config['wordwrap'] = TRUE;
				//memanggil library email dan set konfigurasi untuk pengiriman email
					
				$this->email->initialize($config);
				//konfigurasi pengiriman
				$this->email->from($config['smtp_user']);
				$this->email->to($this->input->post('email'));
				$this->email->subject("Reset your password");
 
				$message = "<p>Anda melakukan permintaan reset password</p>";
				$message .= "<a href='".base_url().'auth/proses_resset_password/'.$resset_key."'>klik reset password</a>";
				$this->email->message($message);
				
				if($this->email->send())
				{
                
				$this->load->view('templates/header');
                $this->load->view('templates/topbar');
                 $this->load->view('proses_resset_password');
                $this->load->view('templates/footer');
				}else
				{
					echo "Berhasil melakukan registrasi, gagal mengirim verifikasi email";
				}
				
				
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email Yang Anda Masukan Tidak Terdaftar! </strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('auth/resset_password');
        }
    }else{
        echo 0;
        redirect('auth/resset_password');
    }
}

        public function proses_resset_password($resset_key){
            
            $data['key'] = $this->model_auth->ambil_key($resset_key);
            $this->load->view('templates/header');
            $this->load->view('templates/topbar');
            $this->load->view('form_resset_password', $data);
            $this->load->view('templates/footer');
                
        }
        public function update_proses_resset_password(){
            $this->form_validation->set_rules('password_1', 'Password_1', 'required|matches[password_2]');
            $this->form_validation->set_rules('password_2', 'Password_2', 'required|matches[password_1]');
            $resset_key = $this->input->post('resset_key');
            $password = $this->input->post('password_1');
        if($this->form_validation->run()==FALSE){
                $this->load->view('templates/header');
                $this->load->view('templates/topbar');
               $this->load->view('form_resset_password');
               $this->load->view('templates/footer');include_once 'file';
            }else{
                $where = array('resset_password' => $resset_key);
                $data  = array('password' => MD5($password));
                $this->model_auth->resset_password($where, $data, 'tb_user');

                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Password Berhasil Diganti, Silahkan Login! </strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('auth/login');
            }
        }


}

