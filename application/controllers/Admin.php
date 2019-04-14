<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
            $this->load->model('produk_model');
            $this->load->library('form_validation');
        }
    public function index()
    {
        $this->load->view('templates/sidebar');
        $this->load->view('templates/header');
        $this->load->view('admin/overview');
        $this->load->view('templates/footer');
    }
}
