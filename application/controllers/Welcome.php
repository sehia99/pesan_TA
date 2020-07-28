<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$where = array('stok !=' => 0);
		$data['makmin']=$this->model_makmin->tampil_data_home($where)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}
	public function detail($id_makmin){
		$data['makmin'] = $this->model_makmin->detail_makmin($id_makmin);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_makmin', $data);
		$this->load->view('templates/footer');
	}

	public function testing(){
		if($this->input->post('btnKirim')){
			$paket = $this->input->post();
			//kita bisa cetak ada variabel apa saja yang dikirimkan form
			echo '<pre>';
			print_r($paket);
			echo '</pre>';
			//kita urai masing-masing variabel post
			$no_id	= $this->input->get('no_id');
			$nama	= $this->input->get('nama');
			$alamat	= $this->input->get('alamat');
			//dan seterusnya 
		}
		$this->load->view('testing');
	
	}
}
