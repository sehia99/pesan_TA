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
        $where = array('tb_user.id' => $id);
        $get_prov = $this->db->select('*')->order_by('nama', 'ASC')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();
        $data['user'] = $this->model_admin->edit($where, 'tb_user')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_profil', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|callback_alpha_check',[
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username|alpha_numeric',[
            'required' => 'Username Tidak Boleh Kosong!',
            
            'alpha_numeric' => 'Username Hanya Boleh Menggunakan Huruf dan Angka'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_user_email',[
            'required' => 'Email Tidak Boleh Kosong!',
            
        ]);
        $this->form_validation->set_rules('no_tlp', 'No.Tlp', 'required|is_natural|min_length[10]|max_length[13]',[
            'required' => 'No. Telephone Tidak Boleh Kosong!',
            'is_natural'   => 'Hanya Boleh Menggunakan Angka',
            'min_length' => 'Tidak Boleh Kurang dari 10',
            'max_length' => 'Tidak Boleh lebih dari 13'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',[
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
       
        $id          =$this->input->post('id');
        
        if($this->form_validation->run()){
            $id          =$this->input->post('id');
            $nama        =$this->input->post('nama');
            $username    =$this->input->post('username');
            $email       =$this->input->post('email');
            $no_tlp      =$this->input->post('no_tlp');
            $alamat      =$this->input->post('alamat');
            $role_id     =$this->input->post('role_id');
             $prov        =$this->input->post('prov');
            $kab         =$this->input->post('kab');
            $kec         =$this->input->post('kec');
            $des         =$this->input->post('des');
            $data = array(
                'nama'  =>$nama,
                'username'  =>$username,
                'email'     =>$email,
                'no_tlp'    =>$no_tlp,
                'alamat'    =>$alamat,
                'role_id'   =>$role_id,
                'prov'      =>$prov,
                'kab'       =>$kab,
                'kec'       =>$kec,
                'des'       =>$des
            );
    
            $where = array ('id' => $id);
            $this->model_admin->update_data($where, $data, 'tb_user');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Profil Telah Diupdate !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/profil');
            
        }else{
            $where = array('tb_user.id' => $id);
        $get_prov = $this->db->select('*')->order_by('nama', 'ASC')->from('wilayah_provinsi')->get();
        $data['provinsi'] = $get_prov->result();
         $data['user'] = $this->model_admin->edit($where, 'tb_user')->result();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_profil', $data);
            $this->load->view('templates_admin/footer');
    }
}

    public function form_ganti_password(){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_password');
        $this->load->view('templates_admin/footer'); 
    }

    public function ganti_password(){
        $this->form_validation->set_rules('old_password', 'old_password', 'required');
        $this->form_validation->set_rules('password_1', 'Password_1', 'required|matches[password_2]|min_length[6]',[
            'required' => 'Password Tidak Boleh Kosong!',
            'matches'   => 'Password Tidak Cocok!'
        ]);
        $this->form_validation->set_rules('password_2', 'Password_2', 'required|matches[password_1]|min_length[6]',[
            'required' => 'Password Tidak Boleh Kosong!',
            'matches'   => 'Password Tidak Cocok!'
        ]);

        $username   =$this->session->userdata('username');
        $old_password = MD5($this->input->post('old_password'));
        $password_1 = $this->input->post('password_1');
        $password_2 = $this->input->post('password_2');

        if($this->form_validation->run()== FALSE){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_password');
        $this->load->view('templates_admin/footer');
        }else{
            $where = array('username' =>$username   
        );
            $data = array('password' =>MD5($password_1));
            $cek = $this->model_admin->ambil_username($username);
         
            if($cek->password == $old_password){
                $this->model_admin->update_password($where, $data, 'tb_user');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Password Telah Diperbaharui !</strong>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/profil/index');
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password yang Anda Masukan Salah</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/profil/form_ganti_password');
        };

    };
    }

    public function alpha_check($fullname){
        if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_check', 'Hanya Boleh Menggunakan Huruf');
            return FALSE;
        } else {
            return TRUE;
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

    function check_user_email($email) {        
        if($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->model_admin->check_unique_user_email($id, $email);
        if($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_user_email', 'Email Sudah Terdaftar');
            $response = false;
        }
        return $response;
    }
    
    function check_username($username) {        
        if($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->model_admin->check_unique_username($id, $username);
        if($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_username', 'Username Sudah Terdaftar');
            $response = false;
        }
        return $response;
    }

    public function edit_photo(){
        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_gambar_check');
        if($this->form_validation->run()==FALSE){
            $username = $this->session->userdata('username');
        $data['user'] = $this->model_admin->profil($username);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/profil', $data);
        $this->load->view('templates_admin/footer');
        }else{

        $username   = $this->session->userdata('username');
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
        $data = array('gambar' => $gambar);
        $where= array ('username' =>$username);

        $this->model_user->update_data($where, $data, 'tb_user');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Photo Berhasil Dirubah ! !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/profil');
    }
}
}