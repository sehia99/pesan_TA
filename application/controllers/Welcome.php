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
		$data['makmin']=$this->model_makmin->tampil_data()->result();
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
		date_default_timezone_set('Asia/Jakarta');
		$this->load->view('testing');
		$date = date('Y-m-d H:i:s');
		echo $date;
	}
}
