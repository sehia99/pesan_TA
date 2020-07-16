<?php 



class Rekening extends CI_Controller{

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

    public function alpha_check($fullname){
        if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
            $this->form_validation->set_message('alpha_check', 'Hanya Boleh Menggunakan Huruf');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function index(){
        $data['rek'] = $this->model_rekening->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/rekening', $data);
        $this->load->view('templates_admin/footer');
    }

    public function form_rekening(){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_rekening');
        $this->load->view('templates_admin/footer');  
    }

    public function tambah_aksi(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|callback_alpha_check',[
            'required'  => 'Form Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('nama_bank', 'Nama_bank', 'required|callback_alpha_check',[
            'required'  => 'Form Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_rekening', 'No_rekening', 'required|is_natural',[
            'required'  => 'Form Tidak Boleh Kosong',
            'is_natural'=> 'Hanya Boleh Angka!'
        ]);
        if($this->form_validation->run()==FALSE){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_rekening');
        $this->load->view('templates_admin/footer');
        }else{
            $nama   = $this->input->post('nama');
            $nama_bank  = $this->input->post('nama_bank');
            $no_rekening    = $this->input->post('no_rekening');
            $data = array(
                'nama'  => $nama,
                'nama_bank' => $nama_bank,
                'no_rekening' => $no_rekening
            );
            $this->model_rekening->tambah_aksi($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Telah Ditambah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('admin/rekening');
            }
    } 
    
    public function edit($id){
        $where = array('id'=> $id);
        $data['rek']= $this->model_rekening->edit($where, 'tb_rekening')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_rekening', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|callback_alpha_check',[
            'required' => 'Nama Tidak Boleh Kosong !'
            
        ]);
        $this->form_validation->set_rules('nama_bank', 'Nama_bank', 'required|callback_alpha_check',[
            'required'  => 'Form Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('no_rekening', 'No_rekening', 'required|is_natural',[
            'required'  => 'Form Tidak Boleh Kosong',
            'is_natural'=> 'Hanya Boleh Angka!'
        ]);
        $id             =$this->input->post('id');
        if($this->form_validation->run()==FALSE){
             $where = array('id'=> $id);
         $data['rek']= $this->model_rekening->edit($where, 'tb_rekening')->result();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_rekening',$data);
            $this->load->view('templates_admin/footer');
        }else{
        $id             =$this->input->post('id');
        $nama            =$this->input->post('nama');
        $no_rekening     =$this->input->post('no_rekening');
        $nama_bank       =$this->input->post('nama_bank');
        
        $data = array(
            'nama' =>$nama,
            'nama_bank'  =>$nama_bank,
            'no_rekening'    =>$no_rekening,          
            
        );

        $where= array ('id' =>$id);

        $this->model_rekening->update_data($where, $data, 'tb_rekening');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Telah Diupdate !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/rekening');
    }
    }
    public function hapus($id){
        $where= array('id'=> $id);
        $this->model_rekening->hapus_data($where, 'tb_rekening');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Telah Dihapus !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/rekening');
    }
}