<?php 

class Kategori extends CI_Controller{
    public function makanan(){
        $where = array('stok !=' => 0,
                        'kategori' => 'Makanan'
    );
        $data['makanan'] = $this->model_kategori->data_makanan($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('makanan', $data);
        $this->load->view('templates/footer');
    }
    public function minuman(){
        $where = array('stok !=' => 0,
                        'kategori' => 'Minuman'
    );
        $data['minuman'] = $this->model_kategori->data_minuman($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('minuman', $data);
        $this->load->view('templates/footer');
    }
}