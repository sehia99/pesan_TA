<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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

	public function pdf()
	{
	
		$start = $this->input->post('start');
		$end   = $this->input->post('end');

		$where = array('status' => 'diterima');
		$data['lap'] = $this->model_laporan->get_laporan($where, $start, $end);
		$this->load->view('admin/pdf', $data);

		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan_Penjualan.pdf", array('Attachment' => 0));
	}

	public function print()
	{
		$start = $this->input->post('start');
		$end   = $this->input->post('end');

		$where = array('status' => 'diterima');
		$data['lap'] = $this->model_laporan->get_laporan($where, $start, $end);
		$this->load->view('admin/print_laporan', $data);
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/admin/laporan.php */