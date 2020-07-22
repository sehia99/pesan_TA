<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$where = array('status' => 'diterima',
						'DATE(tgl_pesan)' => date('Y-m-d')
	);
		$data['lap'] = $this->model_laporan->tampil_data($where);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function get_laporan()
	{
		$start = $this->input->post('start');
		$end   = $this->input->post('end');

		$where = array('status' => 'diterima');
		$data['lap'] = $this->model_laporan->get_laporan($where, $start, $end);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporan', $data);
		$this->load->view('templates_admin/footer');
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/admin/laporan.php */