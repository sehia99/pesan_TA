<?php

class Dashboard_user extends CI_Controller{
    public function index(){
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('user/dashboard');
        $this->load->view('templates_user/footer');
    }

    
}