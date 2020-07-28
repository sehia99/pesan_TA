<?php 


class Registrasi extends CI_Controller{
    public function index(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|callback_alpha_check',[
            'required' => 'Nama Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_number|callback_check_username',[
            'required' => 'Username Tidak Boleh Kosong!',
            'alpha_number' => 'Hanya Boleh Huruf dan Angka'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_user_email',[
            'required' => 'Email Tidak Boleh Kosong!',
            'unique'    => 'Email Sudah Terdaftar'
        ]);
        $this->form_validation->set_rules('no_tlp', 'No.Tlp', 'required|min_length[10]|max_length[13]',[
            'required' => 'No. Telephone Tidak Boleh Kosong!',
            'min_length' => 'Nomor Tidak Boleh Kurang Dari 10 Angka!',
            'max_length' => 'Nomor Tidak Boleh Lebih Dari 13 Angka!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',[
            'required' => 'Alamat Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]|min_length[6]',[
            'required' => 'Password Tidak Boleh Kosong!',
            'matches'   => 'Password Tidak Cocok!'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]',[
            'required' => 'Password Tidak Boleh Kosong!',
            'matches'   => 'Password Tidak Cocok!'
        ]);

        if($this->form_validation->run() == FALSE){
        //$get_prov = $this->db->select('*')->order_by('nama', 'ASC')->from('wilayah_provinsi')->get();
        $get_kab = $this->db->select('*')->order_by('nama', 'ASC')->from('wilayah_kabupaten')->where('provinsi_id', '33')->get();    
        //$data['provinsi'] = $get_prov->result();  
        $data['kabupaten'] = $get_kab->result(); 
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('registrasi',$data);
        $this->load->view('templates/footer');
        }else{
            $data = array(
                'id'    =>'',
                'username'  =>$this->input->post('username'),
                'nama'  =>$this->input->post('nama'),
                'no_tlp' =>$this->input->post('no_tlp'),
                'alamat' =>$this->input->post('alamat'),
                'prov'   =>$this->input->post('prov'),
                'kab'   =>$this->input->post('kab'),
                'kec'=>$this->input->post('kec'),
                'des'   =>$this->input->post('des'),
                'password'  =>MD5($this->input->post('password_1')),
                'email'  =>$this->input->post('email'),
                'role_id'   =>$this->input->post('role_id')
            );
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrasi Berhasil, Silahkan Login !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('auth/login');
        }
    }

    function add_ajax_kab($id_prov)
    {
        $query = $this->db->order_by('nama', 'ASC')->get_where('wilayah_kabupaten',array('provinsi_id'=>$id_prov));
        $data = "<option value=''>- Select Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
  
    function add_ajax_kec($id_kab)
    {
        $query = $this->db->order_by('nama', 'ASC')->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }
  
    function add_ajax_des($id_kec)
    {
        $query = $this->db->order_by('nama', 'ASC')->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
        $data = "<option value=''> - Pilih Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
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
        if($this->input->post('id')){
            $id = $this->input->post('id');
        }
        else{
            $id = '';
        }
        if(! preg_match('/^[0-9a-zA-Z]+$/', $username)){
            $this->form_validation->set_message('check_username', 'Hanya Boleh Menggunakan Huruf dan Angka!');
            $response = false;
        }else{
        $result = $this->model_admin->check_unique_username($id, $username);
        if($result == 0){
            $response = true;
        }
        else {
            $this->form_validation->set_message('check_username', 'Username Sudah Terdaftar');
            $response = false;
        }
    }
        return $response;
    }
    
}